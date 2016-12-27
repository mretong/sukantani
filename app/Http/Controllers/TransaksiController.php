<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaksi;

class TransaksiController extends Controller
{
    public function index() {

    	$transactions = Transaksi::orderBy('agensi_id', 'asc')->get();

    	return view('members.transaksi', compact('transactions'));

    }
}
