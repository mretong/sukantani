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

    	$expect = 213;
    	$collections = collect();

    	foreach($agencies as $agency) {

    		$kontinjen 			= Kontinjen::where('agensi_id', $agency->id)->count();
    		$kontinjenLelaki	= Kontinjen::where('agensi_id', $agency->id)
    								->where('jantina', 'LELAKI')
    								->count();
			$kontinjenWanita	= Kontinjen::where('agensi_id', $agency->id)
    								->where('jantina', 'WANITA')
    								->count();
			// $peserta          = Peserta::where('agensi_id', $agency->id)->count();
            // $pesertaLelaki       = Peserta::where('agensi_id', $agency->id)
            //                      ->where('jantina', 'LELAKI')
            //                      ->count();
            // $pesertaWanita       = Peserta::where('agensi_id', $agency->id)
            //                      ->where('jantina', 'WANITA')
            //                      ->count();
            $peserta 			= Peserta::where('agensi_id', $agency->id)->get();
            $peserta = $peserta->filter(function($temp) {
                            if(count($temp->acara) > 0)
                                return true;
                        });
            $peserta = $peserta->count();

			$pesertaLelaki 		= Peserta::where('agensi_id', $agency->id)
									->where('jantina', 'LELAKI')
									->get();
            $pesertaLelaki = $pesertaLelaki->filter(function($temp) {
                                if(count($temp->acara) > 0)
                                    return true;
                            });
            $pesertaLelaki = $pesertaLelaki->count();

			$pesertaWanita 		= Peserta::where('agensi_id', $agency->id)
									->where('jantina', 'WANITA')
									->get();
            $pesertaWanita = $pesertaWanita->filter(function($temp) {
                                if(count($temp->acara) > 0)
                                    return true;
                            });
            $pesertaWanita = $pesertaWanita->count();


    		$collections = $collections->push([
    							'agensi' 			=> $agency->nama,
    							'agensiKod'			=> $agency->kod,
    							'kontinjen' 		=> $kontinjen,
    							'kontinjenLelaki' 	=> $kontinjenLelaki,
    							'kontinjenWanita'	=> $kontinjenWanita,
    							'peserta'			=> $peserta,
    							'pesertaLelaki'		=> $pesertaLelaki,
    							'pesertaWanita'		=> $pesertaWanita
							]);
    	}

    	return view('members.summary', compact('collections'));
    }
}
