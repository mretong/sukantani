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
            $pesertas   = Peserta::where('agensi_id', $agency_id)->get();

            $kontinjenLelaki    = $kontinjen->filter(function($temp) {
                                    if($temp->jantina == 'LELAKI')
                                        return true;
                                });
            $kontinjenWanita    = $kontinjen->filter(function($temp) {
                                    if($temp->jantina == 'WANITA')
                                        return true;
                                });

            $pesertaLelaki      = $pesertas->filter(function($temp) {
                                    if($peserta->jantina == 'LELAKI') {
                                        foreach($temp->acara as $acara) {
                                            if(count($acara) > 0)
                                                return true;
                                        }
                                    }
                                });

            $pesertaWanita      = $pesertas->filter(function($temp) {
                                    if($peserta->jantina == 'WANITA') {
                                        foreach($temp->acara as $acara) {
                                            if(count($acara) > 0)
                                                return true;
                                        }
                                    }
                                });




            $collections = $collection->push([
                            'agensi'    => $agency->nama,
                            'lelaki'    => ,
                            'wanita'    => ,
                            'jumlah'    =>
                            ])
    	}

    	return view('members.summary', compact('collections'));
    }
}
