<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;

use App\Kontinjen;
use App\Acara;
use App\Penyertaan;
use App\Peserta;
use App\Agensi;

use PDF;
use View;



class PdfController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function kontinjen($agensi_id) {

        $agensi = Agensi::where('id', $agensi_id)->first();

        $contingents = Kontinjen::where('agensi_id', $agensi_id)
                        ->orderBy('role', 'asc')
                        ->get();
	
		$pdf = PDF::loadView('members.pdf.kontinjen', ['contingents' => $contingents, 'agensi' => $agensi]);
		return $pdf->stream(Auth::user()->agensi->kod . ' - Maklumat Kontinjen.pdf');
    }

    public function acara($id) {

        $acara = Acara::where('id', $id)->first();

        $penyertaans = Penyertaan::where('acara_id', $id)->get();

        $participants = Array();

        foreach($penyertaans as $penyertaan) {
            
            $peserta = Peserta::where('id', $penyertaan->peserta_id)
                        ->where('agensi_id', Auth::user()->agensi_id)
                        ->limit($acara->limit)
                        ->first();

            if($peserta != null) {
                array_push($participants, $peserta->toArray());
            }            
        }

        // dd(count($participants));
        view()->share('participants', $participants);
        view()->share('acara', $acara);

        $pdf = PDF::loadView('members.pdf.acara');
        return $pdf->stream(Auth::user()->agensi->kod . ' - Maklumat Acara.pdf');
    }

    //
    // Perserta info
    //
    public function peserta($id) {

        // check wether its from the right agensi_id
        $peserta = Peserta::where('id', $id)->first();

        if(Auth::user()->agensi->id > 2 && Auth::user()->agensi->id != $peserta->agensi_id) {

            if($peserta->agensi_id != Auth::user()->agensi->id){
                Session::flash('error', 'Gagal. Peserta ini bukan dari agensi anda.');
                return back();
            }
        }

        view()->share('peserta', $peserta);
        $html = View::make('members.pdf.peserta-info', $peserta);
        $pdf = Pdf::loadHTML($html);

        // return public_path(); 
        // return $peserta->photo;
        // return view('members.pdf.peserta-info', compact('peserta'));
        return $pdf->stream(Auth::user()->agensi->kod . ' - Profil Atlet.pdf');
    }

    //
    // Profil
    //
    public function profil() {

        $agencies = Agensi::orderBy('nama', 'asc')->pluck('nama', 'id');

        return view('members.pdf.agensiProfil', compact('agencies'));      
    }

    public function profilPost(Request $request) {

        $pesertas = Peserta::where('agensi_id', $request->get('agensi_id'))
                    ->orderBy('noAtlet', 'asc')
                    ->skip(0)
                    ->take(50)
                    ->get();

        view()->share('pesertas', $pesertas);
        $html = View::make('members.pdf.profile', $pesertas);
        $pdf = Pdf::loadHTML($html);
        // return view('members.pdf.profile', compact('pesertas'));
        return $pdf->stream(Auth::user()->agensi->kod . ' - Profil Keseluruhan Setiap Atlet.pdf');
    }

    //
    // Tagging
    //
    public function tag(Request $request) {

        $agency = Agensi::where('id', $request->id)->first();

        $contingents = Kontinjen::where('agensi_id', $request->id)
                        ->orderBy('role', 'asc')
                        ->get();

        // if($contingents == null) {
        //     Session::flash('error', 'Gagal. ' . Auth::user()->agensi->kod . ' belum mengisi ruangan kontinjen.');
        //     return back();
        // }

        $participants = Peserta::where('agensi_id', $request->id)
                        ->orderBy('nama', 'asc')
                        ->get();


        view()->share('participants', $participants);
        view()->share('contingents', $contingents);
        view()->share('agency', $agency);

        $pdf = PDF::loadView('members.pdf.tagging');
        return $pdf->stream(Auth::user()->agensi->kod . ' - Maklumat Acara.pdf');
    }

    //
    // Laporan
    //
    public function laporanKeseluruhan($id) {

        // Access Limitation
        if(Auth::user()->email != 'suhairi81@gmail.com') {
            if(Auth::user()->agensi->id != $id){
                Session::flash('error', 'Gagal. Tiada hak akses.');
                return back();
            }
        }

        $pesertas = Peserta::where('agensi_id', Auth::user()->agensi->id)
                    ->orderBy('vege', 'desc')
                    ->orderBy('jantina', 'asc')
                    ->orderBy('tarafJawatan', 'desc')
                    ->orderBy('nama', 'asc')
                    ->get();

        view()->share('pesertas', $pesertas);

        $pdf = Pdf::loadView('members.pdf.laporan.keseluruhan');
        return $pdf->download(Auth::user()->agensi->kod . ' - Laporan Peserta Keseluruhan.pdf');
    }

    public function laporanAcaraKeseluruhan() {
        $acaras = Acara::orderBy('nama', 'asc')->get();

        // ### TESTING ###
        // $pesertas = null;
        // foreach($acaras as $acara) {

        //     $collection = collect($acara->peserta);
        //     $collection = $collection->sortByDesc('role');
        //     $collection = $collection->filter(function($peserta) {
        //                     if($peserta->agensi_id == Auth::user()->agensi->id)
        //                         return true;
        //                     });
        //     $pesertas   = $collection->take(3);

        //     echo "<br /><br />";
        //     echo "Acara : " . $acara->nama . "<br />";

        //     $bil = 1;
        //     foreach($pesertas as $peserta){
                
        //         echo $bil++ . "<br />";
        //         echo "Nama : " . $peserta->nama . "<br />";
        //         echo "Agensi : " . $peserta->agensi->nama . "<br />";
        //     }

        // }

        // return;
        // dd($pesertas->toArray());

        // ### END OF TESTING ###

        // return view('members.pdf.laporan.acara-keseluruhan', compact('acaras'));
        $pdf = Pdf::loadView('members.pdf.laporan.acara-keseluruhan', ['acaras' => $acaras]);
        return $pdf->stream(Auth::user()->agensi->kod . ' - Laporan Keseluruhan Peserta Mengikut Acara.pdf');
    }

    //
    // ADMIN :: Penginapan
    //
    public function penginapan() {

        $acaras = Acara::limit(9)->get();
        $agencies = Agensi::limit(2)->get();

        view()->share('acaras', $acaras);
        view()->share('agencies', $agencies);

        $pdf = Pdf::loadView('members.pdf.laporan.penginapan');
        // return view('members.pdf.laporan.penginapan', compact('acaras', 'agencies'));

        return $pdf->stream(Auth::user()->agensi->kod . ' - Ringkasan Penginapan.pdf');
    }

    //
    //  ADMIN :: Rumusan
    //
    public function rumusan($id) {

        $agensi = Agensi::where('id', $id)->first();

        $pesertas = Peserta::where('agensi_id', $id)->get();

        $games = Acara::orderBy('nama', 'asc')->get();

        $collections = collect([]);
        foreach($games as $game) {

            $temp = $pesertas->filter(function($peserta) use ($game) {

                        $temp2 = Array();
                        foreach($peserta->acara as $acara)
                            array_push($temp2, $acara->id);

                        if(in_array($game->id, $temp2))
                            return true;

                    });

            $collections = $collections->push(['acara' => $game->nama, 'bilangan' => $temp->count()]);             
        }

        // return view('members.pdf.rumusan', compact('agensi', 'collections'));

        $pdf = Pdf::loadView('members.pdf.rumusan', ['agensi' => $agensi, 'collections' => $collections]);

        return $pdf->stream(Auth::user()->agensi->kod . ' - Ringkasan Bilangan Pendaftaran Online.pdf');
    }

    public function summary() {

        $agencies = Agensi::orderBy('id', 'asc')->get();

        // dd($agencies);

        // 1. kontinjen
        // 2. peserta

        $expect = 213;
        $collections = collect();

        foreach($agencies as $agency) {

            $kontinjen          = Kontinjen::where('agensi_id', $agency->id)->count();
            $kontinjenLelaki    = Kontinjen::where('agensi_id', $agency->id)
                                    ->where('jantina', 'LELAKI')
                                    ->count();
            $kontinjenWanita    = Kontinjen::where('agensi_id', $agency->id)
                                    ->where('jantina', 'WANITA')
                                    ->count();
            $peserta            = Peserta::where('agensi_id', $agency->id)->count();
            $pesertaLelaki      = Peserta::where('agensi_id', $agency->id)
                                    ->where('jantina', 'LELAKI')
                                    ->count();
            $pesertaWanita      = Peserta::where('agensi_id', $agency->id)
                                    ->where('jantina', 'WANITA')
                                    ->count();

            $collections = $collections->push([
                                'agensi'            => $agency->nama,
                                'agensiKod'         => $agency->kod,
                                'kontinjen'         => $kontinjen,
                                'kontinjenLelaki'   => $kontinjenLelaki,
                                'kontinjenWanita'   => $kontinjenWanita,
                                'peserta'           => $peserta,
                                'pesertaLelaki'     => $pesertaLelaki,
                                'pesertaWanita'     => $pesertaWanita
                            ]);
        }

        // return view('members.pdf.summary', compact('collections'));

        view()->share('collections', $collections);
        $html = View::make('members.pdf.summary');
        $pdf = Pdf::loadHTML($html);

        return $pdf->stream(Auth::user()->agensi->kod . ' - Ringkasan Penyertaan Seluruh Agensi.pdf');
    }

    public function pesertaAcara($id) {

        $acara = Acara::where('id', $id)->first();

        $pesertas = Peserta::orderBy('agensi_id', 'asc')
                    ->orderBy('role', 'desc')
                    ->get();

        $pesertas = $pesertas->filter(function($peserta) use($id) {

                        foreach($peserta->acara as $acara) {
                            if($acara->id == $id)
                                return true;
                        }
                    });

        // dd($pesertas);
        view()->share('pesertas', $pesertas);
        view()->share('acara', $acara);

        // return view('members.pdf.acara', compact('pesertas'));

        $pdf = PDF::loadView('members.pdf.acara');
        return $pdf->stream(Auth::user()->agensi->kod . ' - Maklumat Keseluruhan Peserta Mengikut Acara.pdf');
    }

    public function keputusanAgensiAcara($agensi_id) {

        $agensi = Agensi::where('id', $agensi_id)->first();
        $games = Acara::orderBy('nama', 'asc')->get();

        view()->share('agensi', $agensi);
        view()->share('games', $games);

        $pdf = PDF::loadView('members.pdf.keputusanAgensiAcara');
        return $pdf->stream(Auth::user()->agensi->kod . ' - Senarai Peserta Mengikut Acara.pdf'); 

        return view('members.pdf.keputusanAgensiAcara', compact('games', 'agensi'));
    }



}
