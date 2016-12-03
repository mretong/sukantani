<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Penyertaan;
use App\Peserta;

class SettingsController extends Controller
{
    public function setting1() {

    	$penyertaans = Penyertaan::all();

    	foreach($penyertaans as $penyertaan) {

    		$peserta = Peserta::where('id', $penyertaan->peserta_id)->get();

    		if($peserta->isEmpty()) {

    			$temp = Penyertaan::where('peserta_id', $penyertaan->peserta_id)
    					->delete();
    		}
    	}

    	return back();
    }
}
