<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Penyertaan;
use App\Peserta;
use App\Acara;
use App\Agensi;
use App\User;


class SettingsController extends Controller
{
    /*
    // Remove penyertaan.peserta_id not_in peserta
    */
    public function setting1() {

    	$penyertaans = Penyertaan::all();

    	foreach($penyertaans as $penyertaan) {

    		$peserta = Peserta::where('id', $penyertaan->peserta_id)->get();

    		if($peserta->isEmpty()) {

    			$temp = Penyertaan::where('peserta_id', $penyertaan->peserta_id)
    					->delete();
    		}
    	}

    	return back();
    }

    /*
    // Limit the players in every acara
    // And remove the rest in penyertaan table
    */
    public function setting2() {

        $acaras =  Acara::all();
        $agencies = Agensi::all();

        foreach($agencies as $agency) {

            foreach($acaras as $acara) {

                // $temp is an array for peserta->id that is within limit
                // $temp2 is an array with peserta->id that exceed the acara->limit
                $temp = $temp2 = Array();

                // take peserta for the first $acara->limit
                // the rest will be ignored
                $bil = 0;
                foreach($acara->peserta as $peserta) {                    

                    // filter through the peserta corresponding to his agency
                    if($peserta->agensi_id == $agency->id) {
                        $bil++;
                        if($bil <= $acara->limit) {
                            array_push($temp, $peserta->id);
                        } else {
                            array_push($temp2, $peserta->id);
                        }                        
                    }
                }

                // dd($temp2);
                
                // delete penyertaan with acara->id and temp2->id@peserta->id 
                // which exceed limit
                foreach($temp2 as $tmp) {
                    // dd($tmp);
                    $penyertaan = Penyertaan::where('acara_id', $acara->id)
                                    ->where('peserta_id', $tmp)
                                    ->delete();                                    
                }



            } // end of foreach acara
        }//end of foreach agency

        Session::flash('success', 'Berjaya. Semua acara yg melebihi pemain telah ditapis.');
        return redirect('/home');
    }

    //
    // Remove peserta with no acara
    //
    public function setting3() {
        
        $pesertas = Peserta::all();

        foreach($pesertas as $peserta) {

            if($peserta->acara->isEmpty()) {
                $peserta->delete();
            }
        }

        Session::flash('success', 'Berjaya. Semua peserta yang tiada acara telah dihapuskan.');
        return redirect('/home');
    }

    //
    // Display duplicated no atlet
    //
    public function setting4() {

        $pesertas = \DB::table('peserta')
                      ->selectRaw('noAtlet, COUNT(noAtlet) as count')
                      ->groupBy('noAtlet')
                      ->orderBy('count', 'desc')
                      ->get();

        $collections = $pesertas->filter(function($peserta) {
                            if($peserta->count > 1)
                                return true;
                        });

        return view('members.duplicate', compact('collections'));
    }

    //
    // Update users' status. Act like a locking system.
    //
    public function setting5() {

        $users = User::whereNotIn('id', ['1'])->get();

        return view('members.users', compact('users'));
    }

    public function setting5s($id) {
        
        $user = User::where('id', $id)->first();

        if($user->status == 1)
            $user->status = 0;
        else
            $user->status = 1;

        $user->save();

        return back();
    }

    public function setting6() {

        $collections = Array();

        // nokp less than 12
        $pesertas = Peserta::whereRaw('length(nokp) < 12')
                    ->orderBy('agensi_id', 'asc')
                    ->get();

        array_push($collections, [
                    'title' => 'No KP di bawah 12 Digit',
                    'data'  => $pesertas->toArray()
                ]);

        // No KP greater than 12 digits
        $pesertas = Peserta::whereRaw('length(nokp) > 12')
                    ->orderBy('agensi_id', 'asc')
                    ->get();

        array_push($collections, [
                    'title' => 'No KP melebihi 12 Digit',
                    'data'  => $pesertas->toArray()
                ]);

        // No KP with three 0s consequently
        $pesertas = Peserta::whereRaw('length(nokp) = 12')
                    ->where('nokp', 'like', '%000%')
                    ->orderBy('agensi_id', 'asc')
                    ->get();

        array_push($collections, [
                    'title' => 'No KP yang tidak sah',
                    'data'  => $pesertas->toArray()
                ]);

        return view('members.settings.nokp', compact('collections'));
        

        
    }

}
