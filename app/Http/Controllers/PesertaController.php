<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use Session;
use Redirect;

use App\Peserta;
use App\User;
use App\Agensi;
use App\Acara;
use App\Penyertaan;
use App\Pengurus;

use App\Transaksi;

class PesertaController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function index() {

        if(Auth::user()->status == 0) {
            Session::flush();
            Session::flash('error', 'Ralat.');
            Auth::logout();
            return redirect()->route('login');
        }

    	$participants = Peserta::where('agensi_id', Auth::user()->agensi_id)
                        ->orderBy('nama', 'asc')
                        ->paginate(10);

    	$count = Peserta::where('agensi_id', Auth::user()->agensi_id)->count();

    	$agencies = Agensi::pluck('nama', 'id');
    	$games = Acara::orderBy('nama', 'asc')->get();

    	// dd($games);

    	return view('members.peserta', compact('participants', 'count', 'agencies', 'games'));
    }

    public function pesertaPost(Request $request) {

        if(Auth::user()->id != 13 && Auth::user()->id != 6 && Auth::user()->id != 5) {
            Session::flash('error', 'Ralat. Tidak dibenarkan pendaftaran baru. Hanya kemaskini dibenarkan.');
            return back();
        }

        if(Auth::user()->status == 0) {
            Session::flush();
            Session::flash('error', 'Ralat.');
            Auth::logout();
            return redirect()->route('login');
        }

    	if($request->get('nokp') != '') {
    		$nokp = Peserta::where('nokp', $request->get('nokp'))->first();

    		if($nokp != null) {
    			Session::flash('error', 'Peserta dengan No KP ini telah wujud. Sila buat carian untuk pengemaskinian. (eg: penambahan atau pengurangan acara)');
    			return back()->withInput($request->all());
    		}
    	}

    	$validation = Validator::make($request->all(), [
    		'nama'		=> 'required|min:3',
            'nokp'      => 'required|min:7',
    		// 'notel'		=> 'required|min:7',
            'jantina'   => 'required',
    		'agensi_id'	=> 'required',
    	]);

    	if($validation->fails()){
    		Session::flash('error', 'Ruangan nama, nokp, jantina, gambar,  dan acara adalah wajib diisi. <br />Perlu diisi dengan format yang betul');
    		return back()->withInput($request->all());
    	}

        // Check if there was already a pengurus or jurulatih
        // dd(count($request->get('acara')));

        if($request->get('role') != 'ATLET') {
            
            // check if acara more than 1
            if(count($request->get('acara')) > 1) {
                Session::flash('error', 'Bagi penyertaan Pengurus dan Jurulatih, hanya satu acara dibenarkan.');
                return Redirect::back()->withInput($request->all());
            }

            //check if there was a pengurus or jurulatih
            $pesertas = Peserta::where('agensi_id', Auth::user()->agensi->id)
                        ->where('role', $request->get('role'))
                        ->get();

            if(!$pesertas->isEmpty()) {
                foreach($pesertas as $peserta) {

                    foreach($peserta->acara as $acara) {
                  
                        if(in_array($acara->id, $request->get('acara'))) {

                            if($peserta->role == $request->get('role')) {
                                Session::flash('error', $request->get('role') . ' bagi acara ini telah ada. Sila rujuk Laporan Keseluruhan Penyertaan Acara bagi pengemaskinian');
                                return Redirect::back()->withInput($request->all());
                            }
                        }
                    }
                }     
            }
        }

    	// INSERT

        $destination = 'images/peserta/';
    	$filename = $destination . 'noPhoto.svg';
    	if(!empty($request->file('photo'))) {
    		$destination = 'images/peserta/';
    		$filename = $destination . time() . '-' . $request->get('nokp') . '.' . $request->file('photo')->getClientOriginalExtension();

    		// return $destination;

    		if($request->file('photo')->move($destination, $filename));
    	} else {
            Session::flash('error', 'Gagal. Gambar peserta adalah wajib.');
            return back()->withInput($request->all());
        }


        $count = Peserta::where('agensi_id', Auth::user()->agensi->id)->count();


        if($count <= 0)
            $count++;
        else {
            $noAtlet = Peserta::where('agensi_id', Auth::user()->agensi->id)->max('noAtlet');
            $count = (int)substr($noAtlet, -3);
        }

        $count++;

        $counter = '';
        if($count < 10)
            $counter = '00' . $count;
        else if ($count < 100)
            $counter = '0' . $count;
        else
            $counter = $count;

        $noAtlet = Auth::user()->agensi->kod2 . $counter;

       	$peserta = Peserta::create([
    		'nama'			=> strtoupper($request->get('nama')),
            'nokp'          => $request->get('nokp'),
    		'notel'			=> $request->get('notel'),
    		'jantina'		=> strtoupper($request->get('jantina')),
    		'tarafJawatan'	=> strtoupper($request->get('tarafJawatan')),
    		'gredJawatan'	=> strtoupper($request->get('gredJawatan')),
    		'noPekerja'		=> strtoupper($request->get('noPekerja')),
    		'tarikhLantikan'=> $request->get('tarikhLantikan'),
            'vege'          => $request->get('vege'),
            'role'          => $request->get('role'),
            'noAtlet'       => $noAtlet,
    		'agensi_id'		=> $request->get('agensi_id'),
    		'photo'			=> $filename
		]);

	   $peserta->acara()->attach($request->input('acara'));


       $transaksi = new Transaksi;
       $transaksi->agensi_id = $peserta->agensi_id;
       $transaksi->peserta_id = $peserta->id;
       $transaksi->catatan = "PENDAFTARAN " . $peserta->nama . " dari agensi " . $peserta->agensi->nama . ".";
       $transaksi->save();

  	
    	Session::flash('success', 'Berjaya. Peserta telah direkodkan.');

    	return redirect('/peserta');
    }

    //
    // HAPUS PESERTA
    //
    public function hapus($id) {

        $peserta = Peserta::where('id', $id)->first();
    	$hapus = Peserta::where('id', $id)->delete();
        $penyertaan = Penyertaan::where('peserta_id', $id)->delete();

        // dd($peserta);
    	if($hapus){
            $transaksi = new Transaksi;
            $transaksi->agensi_id = $peserta->agensi_id;
            $transaksi->peserta_id = $peserta->id;
            $transaksi->catatan = "HAPUS " . $peserta->nama . " dari agensi " . $peserta->agensi->nama . ".";
            $transaksi->save();
    		Session::flash('success', 'Berjaya. Peserta telah dihapus.');
        }
    	else
    		Session::flash('error', 'Gagal. Peserta gagal dihapus.');

    	return back();

    }

    //
    // KEMASKINI PESERTA
    //
    public function kemaskini($id) {

    	$peserta = Peserta::where('id', $id)->first();
        $penyertaan = Penyertaan::where('peserta_id', $peserta->id)->get();

        $participates = Array();

        if($penyertaan != null) {
            $penyertaan = $penyertaan->toArray();
            foreach($penyertaan as $temp) {
                array_push($participates, $temp['acara_id']);
            }
        }

    	if($peserta == null){
    		Session::flash('error', 'Gagal. Peserta tidak dijumpai');
    		return redirect('/peserta');
    	}

    	$participants = Peserta::where('agensi_id', Auth::user()->agensi_id)
                        ->orderby('nama', 'asc')
                        ->paginate(10);
    	$count = Peserta::where('agensi_id', Auth::user()->agensi_id)->count();

    	$agencies = Agensi::pluck('nama', 'id');
    	$games = Acara::orderBy('nama', 'asc')->get();

    	return view('members.kemaskini', compact('participants', 'peserta', 'agencies', 'games', 'count', 'participates'));
    }

    public function kemaskiniPost(Request $request) {

        // ### VALIDATION ###
        // INPUT VALIDATION
        $validation = Validator::make($request->all(), [
            'nama'      => 'required|min:3',
            'nokp'      => 'required|min:7',
            // 'notel'     => 'required|min:7',
            'jantina'   => 'required',
            'agensi_id' => 'required',
        ]);

        if($validation->fails()) {
            Session::flash('error', 'Ruangan nama, nokp, acara dan agensi adalah wajib diisi. <br />Perlu diisi dengan format yang betul');
            return redirect('/peserta');
        }    

        // LOGIC VALIDATION

        // Check if the acara already has a pengurus or jurulatih
        $corresponsingPeserta = Peserta::where('id', $request->get('id'))->first();

        if($request->get('role') != 'ATLET') {

            // check if the peserta has more than one acara
            if(count($request->get('acara')) > 1) {
                Session::flash('error', 'Sistem tidak dapat mengemaskini peserta ini sebagai ' . $request->get('role') . ' kerana peserta ini mempunyai lebih dari satu acara. Sila pilih peserta lain sebagai ' . $request->get('role') . ' atau letakkan peserta ini sebagai ATLET dahulu dan buat pengemaskinian semasa hari pendaftaran.');
                return back()->withInput($request->all());
            }

            // check if there is a someone with that role already
            $pesertas = Peserta::where('agensi_id', $request->get('agensi_id'))
                        ->where('role', $request->get('role'))
                        ->get();

            $acaraID = $request->get('acara');
            $acaraID = $acaraID[0];
            echo "Acara ID : " . $acaraID . "<br /><br />";


            foreach($pesertas as $peserta) {

                foreach($peserta->acara as $acara) {


                    // echo 'Looping Peserta ID : ' . $peserta->id . '<br />';
                    // echo 'Acara Peserta ID : ' . $acara->id . '<br />';

                    if($acara->id == $acaraID){

                        // echo 'CORR ID : ' . $corresponsingPeserta . '<br />';
                        // echo 'Loop Peserta : ' . $peserta->id . '<br /><br />';

                        // check if the the role belongs to corresponding peserta
                        if($peserta->id != $corresponsingPeserta->id) {
                            Session::flash('error', 'Sistem tidak dapat mengemaskini peserta ini sebagai ' . $request->get('role') . ' kerana acara ini telah mempunyai ' . $request->get('role') . '. Sila pilih peserta lain sebagai ' . $request->get('role') . ' atau letakkan peserta ini sebagai atlet dahulu dan buat pengemaskinian semasa hari pendaftaran.');
                            return back()->withInput($request->all());
                        }
                    }
                }
            }              
        }

        // ### END OF VALIDATION ###

        // Proses Kemaskini

        $peserta = Peserta::where('id', $request->id)->first();

        $filename = $peserta->photo;
        if(!empty($request->file('photo'))) {
            $destination = 'images/peserta/';
            $filename = $destination . time() . '-' . $request->get('nama') . '.' . $request->file('photo')->getClientOriginalExtension();

            if($request->file('photo')->move($destination, $filename));
        }

        

        $peserta->nama          = $request->get('nama');
        $peserta->nokp          = $request->get('nokp');
        $peserta->notel         = $request->get('notel');
        $peserta->jantina       = $request->get('jantina');
        $peserta->noPekerja     = $request->get('noPekerja');
        $peserta->tarafJawatan  = $request->get('tarafJawatan');
        $peserta->gredJawatan   = $request->get('gredJawatan');
        $peserta->tarikhLantikan= $request->get('tarikhLantikan');
        $peserta->vege          = $request->get('vege');
        $peserta->role          = $request->get('role');
        $peserta->photo         = $filename;

        $penyertaan = Penyertaan::where('peserta_id', $peserta->id)
                        ->delete();

        $bil = 0;

        if($request->get('acara') != null) {
            
            $penyertaan = new Penyertaan;
            foreach($request->get('acara') as $acara) {
                $penyertaan->create([
                    'acara_id'      => $acara,
                    'peserta_id'    => $peserta->id
                ]);
                $bil++;
            }
        }


        if($peserta->update()) {

            $transaksi = new Transaksi;
            $transaksi->agensi_id = $peserta->agensi_id;
            $transaksi->peserta_id = $peserta->id;
            $transaksi->catatan = "KEMASKINI " . $peserta->nama . " dari agensi " . $peserta->agensi->nama . ".";
            $transaksi->save();
            Session::flash('success', 'Berjaya. Peserta telah dikemaskini');
        }
        else
            Session::flash('error', 'Gagal. Peserta gagal dikemaskini');

        return back();
    }

    //
    //  PESERTA INFO
    //

    public function info($id) {

        $peserta = Peserta::where('id', $id)->first();        

        return view('members.peserta-info', compact('peserta'));
    }

}
