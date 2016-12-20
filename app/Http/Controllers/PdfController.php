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

        $contingents = Kontinjen::where('agensi_id', $agensi_id)
                        ->orderBy('role', 'asc')
                        ->get();
	
		$pdf = PDF::loadView('members.pdf.kontinjen', ['contingents' => $contingents]);
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

        if(Auth::user()->agensi->id != $peserta->agensi_id) {

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

        $pesertas = Peserta::orderBy('agensi_id', 'asc')
                    // ->where('agensi_id', '<>', 1)
                    // ->limit(3)
                    ->get();

        view()->share('pesertas', $pesertas);
        $pdf = Pdf::loadView('members.pdf.profile');
        return $pdf->stream(Auth::user()->agensi->kod . ' - Profil Keseluruhan Atlet.pdf');
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
}
