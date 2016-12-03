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

        return View('members.laporan.keseluruhan', compact('acaras'));

    }
}
