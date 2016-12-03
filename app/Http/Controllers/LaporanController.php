<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

use App\Acara;
use App\Peserta;
use App\Penyertaan;

class LaporanController extends Controller
{
    public function keseluruhan() {

    	$acaras = Acara::orderBy('nama', 'asc')->get();

    	// dd($acaras);

    	$lists = Array();

    	foreach($acaras as $acara) {

    		$penyertaan = Penyertaan::where('acara_id', $acara->id)
    					->orderBy('id', 'asc')
    					->get();

			$lists[$acara->id] = $penyertaan;

    	}

    	$peserta = Array();
    	$temp = Array();
    	$bil = 0;
    	foreach($lists as $acara=>$list) {

    		$temp = Peserta::where('id', $list[$acara]->peserta_id)
    				->where('agensi_id', Auth::user()->agensi_id)
    				->first();
			
			// dd($temp);
			
			if($temp != null) {
				array_push($peserta[$acara], $temp);
			}    		
    	}

    	dd($peserta);

    	return View('members.laporan.keseluruhan', compact('acaras', 'lists', 'peserta'));

    }
}
