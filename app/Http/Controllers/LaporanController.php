<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

use App\Acara;
use App\Peserta;
use App\Penyertaan;
use App\Agensi;
use DB;

class LaporanController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

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

    // ADMIN
    public function penginapan() {

        $agencies = Agensi::all();
        $acaras = Acara::all();

        foreach($agencies as $agency){

            // echo "<h2>Agensi : " . $agency->nama . '</h2><br />';

            foreach($acaras as $acara) {

                // echo "<h3>Acara : " . $acara->nama . '</h3><br />';

                $countLelaki = $acara->peserta->where('agensi_id', $agency->id)
                                ->where('jantina', 'LELAKI')
                                ->count();

                $countWanita = $acara->peserta->where('agensi_id', $agency->id)
                                ->where('jantina', 'WANITA')
                                ->count();

                // echo "LELAKI : " . $countLelaki . '<br />';
                // echo "WANITA : " . $countWanita . '<br />';
            }

            // echo '<br />';
        }

        // exit;

        return view('members.laporan.penginapan', compact('agencies', 'acaras'));

    }
}
