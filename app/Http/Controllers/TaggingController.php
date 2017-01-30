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

        // ########################
        // 1 - Query by Agensi
        // ########################

    	//$pesertas = Peserta::where('noAtlet', 'like', 'F%')
        //            ->orderBy('agensi_id', 'asc')
        //            ->orderBy('noAtlet', 'asc')
        //            ->skip(0)
        //            ->take(100)
        //            ->get();

        //$pesertas = $pesertas->filter(function($temp) {
        //                if(count($temp->acara) > 0)
        //                    return true;
        //            });

        // ########################
        // 2 - Query by Acara
        // ########################

        // $pesertas = Peserta::where('noAtlet', 'like', 'M%')
        //             ->orderBy('noAtlet', 'asc')
        //             ->get();

        // $pesertas = $pesertas->filter(function($temp) {
        //                 foreach($temp->acara as $acara) {
        //                     if($acara->id == 15) {
        //                         // if($temp->noAtlet != 'M167')
        //                             return true;
        //                     }
        //                 }
        //             });

        // ########################
        // 3 - Query by noAtlet
        // ########################

         $pesertas = Peserta::where('noAtlet', 'D046')
                     ->orWhere('noAtlet', 'D045')
        //             ->orWhere('noAtlet', 'M080')
        //             ->orWhere('noAtlet', 'M175')
        //             ->orWhere('noAtlet', 'M212')
        //             ->orWhere('noAtlet', 'M194')
        //             ->orWhere('noAtlet', 'M197')
        //             ->orWhere('noAtlet', 'M231')
        //             ->orWhere('noAtlet', 'M208')
        //             ->orWhere('noAtlet', 'M207')
        //             ->orWhere('noAtlet', 'M155')
        //             ->orWhere('noAtlet', 'M152')
        //             ->orWhere('noAtlet', 'M182')
        //             ->orWhere('noAtlet', 'M179')
        //             ->orWhere('noAtlet', 'M198')
        //             ->orWhere('noAtlet', 'M183')
        //             ->orWhere('noAtlet', 'M199')
        //             ->orWhere('noAtlet', 'M200')
        //             ->orWhere('noAtlet', 'M201')
        //             ->orWhere('noAtlet', 'M202')
        //             ->orWhere('noAtlet', 'M203')
        //             ->orWhere('noAtlet', 'M197')
        //             ->orWhere('noAtlet', 'M059')
        //             ->orWhere('noAtlet', 'M215')
        //             ->orWhere('noAtlet', 'M069')
        //             ->orWhere('noAtlet', 'M102')
        //             ->orWhere('noAtlet', 'M213')
        //             ->orWhere('noAtlet', 'M169')
        //             ->orWhere('noAtlet', 'M209')
        //             ->orWhere('noAtlet', 'M172')
        //             ->orWhere('noAtlet', 'M171')
        //             ->orWhere('noAtlet', 'M063')
        //             ->orWhere('noAtlet', 'M173')
        //             ->orWhere('noAtlet', 'M170')
        //             ->orWhere('noAtlet', 'M037')
        //             ->orWhere('noAtlet', 'M204')
        //             ->orWhere('noAtlet', 'M205')
        //             ->orWhere('noAtlet', 'M214')
        //             ->orWhere('noAtlet', 'M177')
                     ->get();


        // dd($pesertas->toArray());

    	view()->share('pesertas', $pesertas);
        $html = View::make('members.tagging.atlet');
    	// $html = View::make('members.tagging.atlet2');
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