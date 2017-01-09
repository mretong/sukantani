<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agensi;
use App\Peserta;

class TaggingController extends Controller
{
    public function index() {

    	$agencies = Agensi::orderBy('nama', 'asc')->pluck('nama', 'id');


    	return view('members.tagging', compact('agencies'));

    }

    public function atlet() {

    	$pesertas = Peserta::orderBy('agensi_id', 'asc')->get();

    	return view('members.tagging.atlet', compact('pesertas'));
    }
}
