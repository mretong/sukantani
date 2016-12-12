<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;

use App\Pengesahan;

class PengesahanController extends Controller
{
    public function index() {

    	$pengesahan = Pengesahan::where('agensi_id', Auth::user()->agensi->id)
    					->first();

    	return view('members.pengesahan', compact('pengesahan'));
    }

    public function indexPost() {

    	$pengesahan = Pengesahan::where('agensi_id', Auth::user()->agensi->id)
    					->first();

		$pengesahan->status = "YA";

		if($pengesahan->save()) {
			Session::flash('success', 'Berjaya. Pengesahan telah dilakukan.');
			return back();
		}
    }
}
