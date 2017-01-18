<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Excel;

use App\User;
use App\Peserta;
use App\Agensi;

class ExcelController extends Controller
{
    public function keseluruhan($id) {

        $agensi = Agensi::where('id', $id)->first();

    	$pesertas = Peserta::select('vege as VEGETARIAN', 'nama as NAMA', 'nokp as ' . "NO_KAD_PENGENALAN" . '', 'jantina as JANTINA', 'noPekerja as NO_PEKERJA', 'noAtlet as NO_ATLET', 'gredJawatan as GRED_JAWATAN', 'tarafJawatan as TARAF_JAWATAN', 'tarikhLantikan as TARIKH_LANTIKAN')
    				->where('agensi_id',$id)
    				->orderBy('vege', 'desc')
                    ->orderBy('jantina', 'asc')
                    ->orderBy('tarafJawatan', 'desc')
                    ->orderBy('nama', 'asc')
                    ->get();

		Excel::create($agensi->kod . ' - Senarai Peserta', function($excel) use($pesertas) {

			// Set the title
		    $excel->setTitle('Laporan Keseluruhan Peserta');

		    // Chain the setters
		    $excel->setCreator('Suhairi Abdul Hamid')
		          ->setCompany('MADA');

		    // Call them separately
		    $excel->setDescription('Laporan Keseluruhan Peserta bagi ' . Auth::user()->agensi->kod . ' mengikut jantina, taraf jawatan dan nama');

		    $excel->sheet('Sheet 1', function($sheet) use($pesertas) {

		        $sheet->fromArray($pesertas->toArray());
		    });
		})->export('xls');

    }
}
