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

    	$pesertas = Peserta::where('noAtlet', 'like', 'M%')
                    ->orderBy('agensi_id', 'asc')
                    ->orderBy('noAtlet', 'asc')
                    ->skip(160)
                    ->take(50)
                    ->get();

        $pesertas = $pesertas->filter(function($temp) {
                        if(count($temp->acara) > 0)
                            return true;
                    });

        //
        // Query by Acara
        //
        // $pesertas = Peserta::where('noAtlet', 'like', 'D%')
        //             ->orderBy('noAtlet', 'asc')
        //             ->get();

        // $pesertas = $pesertas->filter(function($temp) {
        //                 foreach($temp->acara as $acara) {
        //                     if($acara->id == 6)
        //                         return true;
        //                 }
        //             });

        //
        // Query by noAtlet
        //
        // $pesertas = Peserta::where('noAtlet', 'M001')
        //             ->orWhere('noAtlet', 'M002')
        //             ->orWhere('noAtlet', 'M034')
        //             ->orWhere('noAtlet', 'M035')
        //             ->orWhere('noAtlet', 'M036')
        //             ->orWhere('noAtlet', 'M045')
        //             ->orWhere('noAtlet', 'M043')
        //             ->orWhere('noAtlet', 'M042')
        //             ->orWhere('noAtlet', 'M041')
        //             ->orWhere('noAtlet', 'M046')
        //             ->orWhere('noAtlet', 'M050')
        //             ->orWhere('noAtlet', 'M055')
        //             ->orWhere('noAtlet', 'M060')
        //             ->orWhere('noAtlet', 'M061')
        //             ->orWhere('noAtlet', 'M062')
        //             ->orWhere('noAtlet', 'M022')
        //             ->orWhere('noAtlet', 'M021')
        //             ->get();


        // dd($pesertas->toArray());

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