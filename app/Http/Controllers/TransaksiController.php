<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaksi;

class TransaksiController extends Controller
{
    public function index() {

    	$transactions = Transaksi::where('created_at', '>', '2016-12-26')
						->orderBy('agensi_id', 'asc')
    					->orderBy('updated_at', 'asc')
    					->get();

    	return view('members.transaksi', compact('transactions'));

    }
}
