<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;		
use Auth;

use App\Acara;
use App\Penyertaan;
use App\Peserta;

class CarianController extends Controller
{
    public function index() {

    	$acaras = Acara::orderBy('nama', 'asc')->pluck('nama', 'id');

    	return view('members.carian', compact('acaras'));
    }

    public function carian(Request $request) {

    	$acaras = Acara::orderBy('nama', 'asc')->pluck('nama', 'id');

    	$penyertaans = Penyertaan::where('acara_id', $request->get('acara'))
    					->orderBy('peserta_id', 'asc')
    					->get();

		$acara = Acara::where('id', $request->get('acara'))->first();


    	$participants = Array();

    	foreach($penyertaans as $penyertaan) {
    		
    		$peserta = Peserta::where('id', $penyertaan->peserta_id)
    					->where('agensi_id', Auth::user()->agensi_id)
    					->first();

			if($peserta == null) {
				Session::flash('error', 'Gagal. Tiada peserta bagi acara tersebut.');
				return back();
			}

    		array_push($participants, $peserta->toArray());
    	}

    	return view('members.keputusanCarian', compact('participants', 'acara', 'acaras'));
    }
}					