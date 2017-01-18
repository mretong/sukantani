<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Validator;

use App\Kontinjen;
use App\Peserta;
use App\Agensi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(Auth::user()->status == 0) {
            Session::flush();
            Session::flash('error', 'Ralat.');
            Auth::logout();
            return redirect()->route('login');
        }

        $agensi = Agensi::where('id', Auth::user()->agensi->id)->first();

        $contingents = Kontinjen::where('agensi_id', Auth::user()->agensi->id)
                        ->orderBy('role', 'asc')
                        ->get();

        return view('home', compact('contingents', 'agensi'));
    }

    public function kontinjenPost(Request $request) {

        // return $request->all();

        // Validation

        $validation = Validator::make($request->all(), [
                        'nama'      => 'required|min:3',
                        'role'      => 'required',
                        'nokp'      => 'required',
                        'notel'     => 'required',
                        'jantina'   => 'required'

                    ]);

        if($validation->fails()){
            Session::flash('error', 'Gagal. Sila isi semua ruangan yang wajib dengan format yang betul.');
            return back()->withInput($request->all());
        }

        // return $request->all();

        $kontinjen = Kontinjen::where('nokp', $request->get('nokp'))->first();

        $update = false;
        if($kontinjen != null)
            $update = true;



        // Check if role ketua already exist
        // Check if role timbalan already exist
        // Check if role urusetia exceed limit

        if(!$update) {

            $countKetua = Kontinjen::where('agensi_id', Auth::user()->agensi->id)
                            ->where('role', 'KETUA')
                            ->count();

            if($countKetua > 0 && $request->get('role') == 'KETUA') {
                Session::flash('error', 'Gagal. Mengikut rekod, kontinjen ini telah mempunyai Ketua Kontinjen. Sila kemaskini untuk melakukan perubahan.');
                return back()->withInput($request->all());

            }

            $countTimbalan = Kontinjen::where('agensi_id', Auth::user()->agensi->id)
                            ->where('role', 'TIMBALAN')
                            ->count();

            if($countTimbalan > 0&& $request->get('role') == 'TIMBALAN') {
                Session::flash('error', 'Gagal. Mengikut rekod, kontinjen ini telah mempunyai Timbalan Ketua Kontinjen. Sila kemaskini untuk melakukan perubahan.');
                return back()->withInput($request->all());
            }

            $countUrusetia = Kontinjen::where('agensi_id', Auth::user()->agensi->id)
                            ->where('role', 'URUSETIA')
                            ->count();

            if($countUrusetia > 10 && $request->get('role') == 'URUSETIA') {
                Session::flash('error', 'Gagal. Mengikut rekod, kontinjen ini telah mempunyai had 10 urusetia. Sila kemaskini/hapus untuk melakukan perubahan.');
                return back()->withInput($request->all());
            }

            //
            // CREATE
            //

            $kontinjen = Kontinjen::create($request->all());      
            Session::flash('success', 'Berjaya. Maklumat Kontinjen telah didaftarkan.');

            return redirect()->route('home');

        } else {

            $kontinjen->nama    = $request->get('nama');
            $kontinjen->role    = $request->get('role');
            $kontinjen->nokp    = $request->get('nokp');
            $kontinjen->notel   = $request->get('notel');
            $kontinjen->jantina = $request->get('jantina');

            if($kontinjen->save()) {

                // return 'here';

                Session::flash('success', 'Berjaya. Maklumat Kontinjen telah dikemaskini.');
                return redirect()->route('home');

            } else {

                Session::flash('error', 'Gagal. Maklumat Kontinjen gagal dikemaskini.');
                return back()->withInput($request->all());
            }
        }        
    }

    public function hapus($id) {

        $kontinjen = Kontinjen::where('id', $id)->first();

        if($kontinjen->delete()){
            Session::flash('success', 'Berjaya. Maklumat Kontinjen ini telah dihapus.');
            return back();
        } else {
            Session::flash('error', 'Gagal. Maklumat Kontinjen ini gagal dihapus.');
            return back();
        }        
    }

    public function kemaskini($id) {

        $agensi = Agensi::where('id', Auth::user()->agensi->id)->first();

        $contingents = Kontinjen::where('agensi_id', Auth::user()->agensi->id)
                        ->orderBy('role', 'asc')
                        ->get();

        $kontinjen = Kontinjen::where('id', $id)
                        ->first();

        // dd($contingent);


        return view('home', compact('contingents', 'kontinjen', 'agensi'));

    }


}
