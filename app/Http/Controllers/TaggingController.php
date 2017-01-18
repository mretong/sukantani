<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agensi;
use App\Peserta;

use Auth;
use Session;

use PDF;
use View;

class TaggingController extends Controller
{
    public function index() {

    	$agencies = Agensi::orderBy('nama', 'asc')->pluck('nama', 'id');
    	return view('members.tagging', compact('agencies'));

    }

    public function atlet() {

    	$pesertas = Peserta::orderBy('agensi_id', 'asc')->skip(0)->take(1)->get();

    	view()->share('pesertas', $pesertas);
    	$html = View::make('members.tagging.atlet');
        $pdf = Pdf::loadHtml($html);
        return $pdf->setPaper('c3')->stream('Tagging Atlet.pdf');

    	// return view('members.tagging.atlet', compact('pesertas'));
    }

    public function kontinjen() {
    	$pesertas = Kontinjen::orderBy('agensi_id', 'asc')->skip(0)->take(1)->get();

        view()->share('pesertas', $pesertas);
        $html = View::make('members.tagging.kontinjen');
        $pdf = Pdf::loadHtml($html);
        return $pdf->setPaper('c3')->stream('Tagging Kontinjen.pdf');

    	return back();
    }
}