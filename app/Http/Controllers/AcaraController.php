<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

use App\Penyertaan;

class AcaraController extends Controller
{
    public function hapus($peserta, $acara) {



    	$penyertaan = Penyertaan::where('peserta_id', $peserta)
    					->where('acara_id', $acara)
    					->first();

		// dd($penyertaan);

		if($penyertaan->delete()) {
			Session::flash('success', 'Berjaya. Peserta ini telah dihapuskan dari acara ini.');
		} else {
			Session::flash('success', 'Berjaya. Peserta ini telah dihapuskan dari acara ini.');
		}

		return redirect()->back();
    }
}
