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

    	// $pesertas = Peserta::where('noAtlet', 'like', 'P%')
     //                ->orderBy('agensi_id', 'asc')
     //                ->orderBy('noAtlet', 'asc')
     //                ->skip(0)
     //                ->take(100)
     //                ->get();

     //    $pesertas = $pesertas->filter(function($temp) {
     //                    if(count($temp->acara) > 0)
     //                        return true;
     //                });

        // ########################
        // 2 - Query by Acara
        // ########################

        // $pesertas = Peserta::where('noAtlet', 'like', 'D%')
        //             ->orderBy('noAtlet', 'asc')
        //             ->get();

        // $pesertas = $pesertas->filter(function($temp) {
        //                 foreach($temp->acara as $acara) {
        //                     if($acara->id == 6)
        //                         return true;
        //                 }
        //             });

        // ########################
        // 3 - Query by noAtlet
        // ########################

        $pesertas = Peserta::where('noAtlet', 'D050')
                    ->orWhere('noAtlet', 'D056')
                    ->orWhere('noAtlet', 'D157')
                    ->orWhere('noAtlet', 'D158')
                    ->orWhere('noAtlet', 'D156')
                    ->orWhere('noAtlet', 'D155')
                    ->orWhere('noAtlet', 'D153')
                    ->orWhere('noAtlet', 'D154')
                    ->orWhere('noAtlet', 'D152')
                    ->orWhere('noAtlet', 'D150')
                    ->orWhere('noAtlet', 'D136')
                    ->orWhere('noAtlet', 'D149')
                    ->orWhere('noAtlet', 'D102')
                    ->orWhere('noAtlet', 'D137')
                    ->orWhere('noAtlet', 'D043')
                    ->orWhere('noAtlet', 'D007')
                    ->orWhere('noAtlet', 'D140')
                    ->orWhere('noAtlet', 'D029')
                    ->orWhere('noAtlet', 'D139')
                    ->orWhere('noAtlet', 'D138')
                    ->orWhere('noAtlet', 'D159')
                    ->orWhere('noAtlet', 'D166')
                    ->orWhere('noAtlet', 'D168')
                    ->orWhere('noAtlet', 'D169')
                    ->orWhere('noAtlet', 'D167')
                    ->orWhere('noAtlet', 'D164')
                    ->orWhere('noAtlet', 'D160')
                    ->orWhere('noAtlet', 'D161')
                    ->orWhere('noAtlet', 'D162')
                    ->orWhere('noAtlet', 'D163')
                    ->orWhere('noAtlet', 'D165')
                    ->get();


        // dd($pesertas->toArray());

    	view()->share('pesertas', $pesertas);
    	$html = View::make('members.tagging.atlet');
        $pdf = Pdf::loadHtml($html);
        return $pdf->setPaper('c3')->stream('Tagging Atlet.pdf');

    }

    public function kontinjen() {
    	$pesertas = Kontinjen::orderBy('role', 'asc')
                    ->orderBy('agensi_id', 'asc')
                    ->skip(0)
                    ->take(1)
                    ->get();

        view()->share('pesertas', $pesertas);
        $html = View::make('members.tagging.kontinjen');
        $pdf = Pdf::loadHtml($html);
        return $pdf->setPaper('c3')->stream('Tagging Kontinjen.pdf');

    	return back();
    }
}