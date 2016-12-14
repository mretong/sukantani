<?php

use Illuminate\Database\Seeder;

use App\Peserta;
use App\Acara;
use Faker\Generator;
use App\Agensi;

class PesertaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// factory(App\Peserta::class, 2500)->create();
	
    	// $pesertas = Peserta::all();

    	// foreach($pesertas as $peserta) {

    	// 	$acara = Array();
    	// 	for($i=0; $i<rand(1, 3); $i++) {
    	// 		$randomAcara = rand(1, 20);

    	// 		if(!in_array($randomAcara, $acara))
    	// 			array_push($acara, $randomAcara);
    	// 	}

    	// 	$peserta->acara()->attach($acara);
    		
    	// }
        
    }

}
