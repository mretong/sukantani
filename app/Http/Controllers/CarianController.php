<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;		
use Auth;

use App\Acara;
use App\Penyertaan;
use App\Peserta;

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

        // dd($acara->limit);

    	$penyertaans = Penyertaan::where('acara_id', $request->get('acara'))
    					->orderBy('peserta_id', 'asc')
    					->get();

    	$participants = Array();

        $bil = 0;
    	foreach($penyertaans as $penyertaan) {

            // dd($penyertaan->peserta_id);
    		$peserta = Peserta::where('id', $penyertaan->peserta_id)
    					->where('agensi_id', Auth::user()->agensi->id)
    					->first();

            if($peserta != null) {
                
                $bil++;
                if($bil > $acara->limit) {
                    break;
                }
                array_push($participants, $peserta->toArray());				
			}
    	}

        // return $bil;

    	return view('members.keputusanCarian', compact('participants', 'acara', 'acaras'));
    }

    public function carianNama() {

        return view('members.carianNama');
    }

    public function carianNamaResult(Request $request) {

        $count = $participants = Peserta::where('nama', 'like', '%' . $request->get('nama') . '%')
                    ->where('agensi_id', Auth::user()->agensi->id)
                    ->count();
        $participants = Peserta::where('nama', 'like', '%' . $request->get('nama') . '%')
                    ->where('agensi_id', Auth::user()->agensi->id)
                    ->paginate(10);

        return view('members.keputusanCarianNama', compact('participants', 'count'));
    }
}					