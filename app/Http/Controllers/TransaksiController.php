<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaksi;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index() {

    	// return Carbon::today();
    	$transactions = Transaksi::where('created_at', '>', Carbon::today())
						->orderBy('agensi_id', 'asc')
    					->orderBy('updated_at', 'asc')
    					->get();

    	return view('members.transaksi', compact('transactions'));

    }
}
