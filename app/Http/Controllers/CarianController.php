<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;		
use Auth;

use App\Acara;
use App\Penyertaan;
use App\Peserta;
use App\Agensi;
use App\Pengurus;

class CarianController extends Controller
{
    public function index() {

    	$acaras = Acara::orderBy('nama', 'asc')->pluck('nama', 'id');

    	return view('members.carian', compact('acaras'));
    }

    public function carian(Request $request) {

        // return $request->all();

    	$acaras = Acara::orderBy('nama', 'asc')->pluck('nama', 'id');

        $acara = Acara::where('id', $request->get('acara'))->first();

        $limit = Acara::where('id', $request->get('acara'))->get();

    	return view('members.keputusanCarian', compact('acara', 'acaras', 'limit'));
    }

    public function carianNama() {

        return view('members.carianNama');
    }

    public function carianNamaResult(Request $request) {

        $count = $participants = Peserta::where('nama', 'like', '%' . $request->get('nama') . '%')
                    ->where('agensi_id', Auth::user()->agensi->id)
                    ->count();
        $participants = Peserta::where('nama', 'like', '%' . $request->get('nama') . '%')
                    ->where('agensi_id', Auth::user()->agensi->id)
                    ->paginate(10);

        return view('members.keputusanCarianNama', compact('participants', 'count'));
    }

    public function carianAcaraAgensi() {

        $games = Acara::orderBy('nama', 'asc')->pluck('nama', 'id');
        $agencies = Agensi::orderBy('nama', 'asc')->pluck('nama', 'id');

        // dd($games);

        return view('members.carian-acara-agensi', compact('games', 'agencies'));
    }

    public function keputusanCarianAcaraAgensi(Request $request) {

        $agensi = Agensi::where('id', $request->get('agensi_id'))->first();
        $acara = Acara::where('id', $request->get('acara_id'))->first();

        $pesertas = $acara->peserta->filter(function($peserta) {
            
            if($peserta->agensi_id == \Request::get('agensi_id'))
                return true;
        });

        return view('members.keputusan-carian-acara-agensi', compact('pesertas', 'acara', 'agensi'));
        
    }
}					