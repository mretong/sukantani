<?php

use Illuminate\Database\Seeder;
use App\Acara;

class AcaraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Acara::create([
        	'nama'	=> strtoupper('badminton (BERPASUKAN)'),
        	'limit'	=> 14
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('batu seremban (W)'),
        	'limit'	=> 7
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('bola jaring (W)'),
        	'limit'	=> 12
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('bola sepak (L)'),
        	'limit'	=> 24
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('bola tampar (L)'),
        	'limit'	=> 14
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('congkak'),
        	'limit'	=> 7
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('dart (BERPASUKAN)'),
        	'limit'	=> 10
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('futsal lelaki (VETERAN)'),
        	'limit'	=> 12
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('golf'),
        	'limit'	=> 5
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('karom (BERPASUKAN)'),
        	'limit'	=> 12
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('larian kampus'),
        	'limit'	=> 16
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('perbarisan kontinjen'),
        	'limit'	=> 100
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('ping pong (BERPASUKAN)'),
        	'limit'	=> 14
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('sepak takraw (L)'),
        	'limit'	=> 14
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('tarikh tali (L)'),
        	'limit'	=> 16
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('persembahan'),
        	'limit'	=> 15
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('bola tampar (W)'),
        	'limit'	=> 12
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('menembak'),
        	'limit'	=> 4
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('boling padang'),
        	'limit'	=> 10
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('10 pin boling'),
        	'limit'	=> 10
    	]);

    }
}
