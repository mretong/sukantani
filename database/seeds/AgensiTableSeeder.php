<?php

use Illuminate\Database\Seeder;
use App\Agensi;

class AgensiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Agensi::create([
            'nama'  => strtoupper('lembaga kemajuan pertanian muda'),
            'kod'   => strtoupper('mada')
        ]);

        Agensi::create([
        	'nama'	=> strtoupper('lembaga kemajuan pertanian kemubu'),
        	'kod'	=> strtoupper('kada')
    	]);


    }
}
