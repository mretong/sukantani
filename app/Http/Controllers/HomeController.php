<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontinjen;
use Auth;

use Session;

use App\Peserta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontinjen = Kontinjen::where('agensi_id', Auth::User()->agensi_id)->first();

        return view('home', compact('kontinjen'));
    }

    public function kontinjenPost(Request $request) {

        $kontinjen = Kontinjen::where('agensi_id', $request->get('agensi_id'))->first();

        // dd($kontinjen);

        if($kontinjen == null)
            $kontinjen = Kontinjen::create($request->all());
        else {
            $kontinjen = Kontinjen::where('agensi_id', $request->get('agensi_id'))
                ->update([
                'ketua'         => strtoupper($request->get('ketua')),
                'timbalan'      => strtoupper($request->get('timbalan')),
                'urusetia1'     => strtoupper($request->get('urusetia1')),
                'urusetia2'     => strtoupper($request->get('urusetia2')),
                'urusetia3'     => strtoupper($request->get('urusetia3')),
                'urusetia4'     => strtoupper($request->get('urusetia4')),
                'urusetia5'     => strtoupper($request->get('urusetia5')),
                'urusetia6'     => strtoupper($request->get('urusetia6')),
                'urusetia7'     => strtoupper($request->get('urusetia7')),
                'urusetia8'     => strtoupper($request->get('urusetia8')),
                'urusetia9'     => strtoupper($request->get('urusetia9')),
                'urusetia10'    => strtoupper($request->get('urusetia10'))
            ]);
        }

        Session::flash('success', 'Maklumat Kontinjen telah dikemaskini.');

        return redirect('/home');
    }
}
