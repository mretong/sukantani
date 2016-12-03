<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agensi;

class TaggingController extends Controller
{
    public function index() {

    	$agencies = Agensi::orderBy('nama', 'asc')->pluck('nama', 'id');


    	return view('members.tagging', compact('agencies'));

    }
}
