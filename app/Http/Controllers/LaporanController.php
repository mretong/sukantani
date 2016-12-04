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

    	$pesertas = Peserta::where('agensi_id', Auth::user()->agensi->id)
                    ->orderBy('vege', 'desc')
                    ->orderBy('jantina', 'asc')
                    ->orderBy('tarafJawatan', 'desc')
                    ->orderBy('nama', 'asc')
                    ->get();

        return View('members.laporan.keseluruhan', compact('pesertas'));
    }

    // Members
    public function acaraKeseluruhan() {
    	
    	$acaras = Acara::orderBy('nama', 'asc')->get();

    	return view('members.laporan.acara-keseluruhan', compact('acaras'));
    }
}
