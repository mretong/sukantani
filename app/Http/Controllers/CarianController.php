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

        

        if(Auth::user()->agensi->id == 1) {
            $count = $participants = Peserta::where('nama', 'like', '%' . $request->get('nama') . '%')
                    ->count();
            $participants = Peserta::where('nama', 'like', '%' . $request->get('nama') . '%')
                    ->paginate(10);
        } else {
            $count = $participants = Peserta::where('nama', 'like', '%' . $request->get('nama') . '%')
                    ->where('agensi_id', Auth::user()->agensi->id)
                    ->count();
            $participants = Peserta::where('nama', 'like', '%' . $request->get('nama') . '%')
                    ->where('agensi_id', Auth::user()->agensi->id)
                    ->paginate(10);
        }

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

    public function rumusan() {

        $agencies = Agensi::orderBy('nama', 'asc')->pluck('nama', 'id');

        return view('members.carianRumusan', compact('agencies'));
    }

    public function rumusanPost(Request $request) {

        // return $request->all();

        $agencies = Agensi::orderBy('nama', 'asc')->pluck('nama', 'id');

        $agensi = Agensi::where('id', $request->get('agensi_id'))->first();

        $pesertas = Peserta::where('agensi_id', $request->get('agensi_id'))
                        ->get();

        $games = Acara::orderBy('nama', 'asc')->get();

        $collections = collect([]);
        foreach($games as $game) {

            $temp = $pesertas->filter(function($peserta) use ($game) {

                        $temp2 = Array();
                        foreach($peserta->acara as $acara)
                            array_push($temp2, $acara->id);

                        if(in_array($game->id, $temp2))
                            return true;

                    });

            $collections = $collections->push(['acara' => $game->nama, 'bilangan' => $temp->count()]);             
        }

        return view('members.keputusanCarianRumusan', compact('agensi', 'collections', 'agencies'));
    }

    public function acara() {

        $games = Acara::orderBy('nama', 'asc')->pluck('nama', 'id');

        return view('members.carianAcara', compact('games'));

    }

    public function acaraPost(Request $request) {

        $penyertaan = Penyertaan::where('acara_id', $request->get('acara_id'))
                    ->get();

        $acara = Acara::where('id', $request->get('acara_id'))->first();

        $pesertas = collect([]);
        foreach($penyertaan as $temp) {

            $peserta = Peserta::where('id', $temp->peserta_id)->first();
            $pesertas->push($peserta);
        }

        $pesertas = $pesertas->sortBy('agensi_id');

        return view('members.keputusanCarianAcara', compact('pesertas', 'acara'));
    }

}					