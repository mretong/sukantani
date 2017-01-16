<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agensi;
use App\Peserta;
use App\Kontinjen;
use App\Acara;

class SummaryController extends Controller
{
    public function index() {

    	$agencies = Agensi::orderBy('id', 'asc')->get();

    	// dd($agencies);

    	// 1. kontinjen
    	// 2. peserta

    	$collections = collect();

    	foreach($agencies as $agency) {

            $kontinjen  = Kontinjen::where('agensi_id', $agency->id)->get();
            $pesertas   = Peserta::where('agensi_id', $agency->id)->get();

            $kontinjenLelaki    = $kontinjen->filter(function($temp) {
                                    if($temp->jantina == 'LELAKI')
                                        return true;
                                });
            $kontinjenWanita    = $kontinjen->filter(function($temp) {
                                    if($temp->jantina == 'WANITA')
                                        return true;
                                });

            $pesertaLelaki      = $pesertas->filter(function($temp) {
                                    if($temp->jantina == 'LELAKI') {
                                        foreach($temp->acara as $acara) {
                                            if(count($acara) > 0)
                                                return true;
                                        }
                                    }
                                });

            $pesertaWanita      = $pesertas->filter(function($temp) {
                                    if($temp->jantina == 'WANITA') {
                                        foreach($temp->acara as $acara) {
                                            if(count($acara) > 0)
                                                return true;
                                        }
                                    }
                                });

            $lelaki = $kontinjenLelaki->count() + $pesertaLelaki->count();
            $wanita = $kontinjenWanita->count() + $pesertaWanita->count();
            $jumlah = $lelaki + $wanita;


            $collections = $collections->push([
                            'agensiKod' => $agency->kod,
                            'agensi'    => $agency->nama,
                            'lelaki'    => $lelaki,
                            'wanita'    => $wanita,
                            'jumlah'    => $jumlah
                            ]);
    	}

    	return view('members.summary', compact('collections'));
    }
}
