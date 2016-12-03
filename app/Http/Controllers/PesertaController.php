<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use Session;

use App\Peserta;
use App\User;
use App\Agensi;
use App\Acara;
use App\Penyertaan;

class PesertaController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function index() {

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

        // return $request->all();

    	// dd($_FILES);
    	if($request->get('nokp') != '') {
    		$nokp = Peserta::where('nokp', $request->get('nokp'))->first();

    		if($nokp != null) {
    			Session::flash('error', 'Peserta dengan No KP ini telah wujud.');
    			return redirect('/peserta');
    		}
    	}

    	$validation = Validator::make($request->all(), [
    		'nama'		=> 'required|min:3',
    		'nokp'		=> 'required|min:7',
    		'agensi_id'	=> 'required',
    	]);

    	if($validation->fails()){
    		Session::flash('error', 'Ruangan nama, nokp, acara dan agensi adalah wajib diisi. <br />Perlu diisi dengan format yang betul');
    		return redirect('/peserta');
    	}

    	// INSERT

    	$filename = '';
    	if(!empty($request->file('photo'))) {
    		$destination = 'images/peserta/';
    		$filename = $destination . time() . '-' . $request->get('nama') . '.' . $request->file('photo')->getClientOriginalExtension();

    		// return $destination;

    		if($request->file('photo')->move($destination, $filename));
    	}

        $count = Peserta::where('agensi_id', Auth::user()->id)->count();
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
    		'nokp'			=> $request->get('nokp'),
    		'jantina'		=> strtoupper($request->get('jantina')),
    		'tarafJawatan'	=> strtoupper($request->get('tarafJawatan')),
    		'gredJawatan'	=> strtoupper($request->get('gredJawatan')),
    		'noPekerja'		=> strtoupper($request->get('noPekerja')),
    		'tarikhLantikan'=> $request->get('tarikhLantikan'),
            'vege'          => $request->get('vege'),
            'noAtlet'       => $noAtlet,
    		'agensi_id'		=> $request->get('agensi_id'),
    		'photo'			=> $filename
		]);

    	$bil = 0;
    	$penyertaan = new Penyertaan;
		foreach($request->get('acara') as $acara) {
			$penyertaan->create([
				'acara_id' 		=> $acara,
				'peserta_id' 	=> $peserta->id
			]);
			$bil++;
		}
  	
    	Session::flash('success', 'Berjaya. Peserta telah direkodkan.');

    	return redirect('/peserta');
    }

    //
    // HAPUS PESERTA
    //
    public function hapus($id) {

    	$peserta = Peserta::where('id', $id)->delete();
        $penyertaan = Penyertaan::where('peserta_id', $id)->delete();

    	if($peserta)
    		Session::flash('success', 'Berjaya. Peserta telah dihapus.');
    	else
    		Session::flash('error', 'Gagal. Peserta gagal dihapus.');

    	return redirect('/peserta');

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

        $validation = Validator::make($request->all(), [
            'nama'      => 'required|min:3',
            'nokp'      => 'required|min:7',
            'agensi_id' => 'required',
        ]);

        if($validation->fails()){
            Session::flash('error', 'Ruangan nama, nokp, acara dan agensi adalah wajib diisi. <br />Perlu diisi dengan format yang betul');
            return redirect('/peserta');
        }

        $filename = '';
        if(!empty($request->file('photo'))) {
            $destination = 'images/peserta/';
            $filename = $destination . time() . '-' . $request->get('nama') . '.' . $request->file('photo')->getClientOriginalExtension();

            // return $destination;

            if($request->file('photo')->move($destination, $filename));
        }

        $peserta = Peserta::where('id', $request->id)->first();

        $peserta->nama          = $request->get('nama');
        $peserta->nokp          = $request->get('nokp');
        $peserta->jantina       = $request->get('jantina');
        $peserta->noPekerja     = $request->get('noPekerja');
        $peserta->tarafJawatan  = $request->get('tarafJawatan');
        $peserta->gredJawatan   = $request->get('gredJawatan');
        $peserta->tarikhLantikan= $request->get('tarikhLantikan');
        $peserta->vege          = $request->get('vege');
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


        if($peserta->update())
            Session::flash('success', 'Berjaya. Peserta telah dikemaskini');
        else
            Session::flash('error', 'Gagal. Peserta gagal dikemaskini');

        return back();
    }

    //
    //  PESERTA INFO
    //

    public function info($id) {

        $peserta = Peserta::where('id', $id)->first();        

        // dd($peserta->nama);
        $penyertaans = Penyertaan::where('peserta_id', $id)->get();

        $acaras = [];

        foreach($penyertaans as $penyertaan) {

            // dd($penyertaan);

            $temp = Acara::where('id', $penyertaan->acara_id)->first();
            array_push($acaras, $temp->nama);
        }

        return view('members.peserta-info', compact('acaras', 'peserta'));
    }

}
