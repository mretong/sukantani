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
        	'nama'	=> strtoupper('badminton (berpasukan)'),
        	'limit'	=> 15
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('batu seremban (w)'),
        	'limit'	=> 7
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('bola jaring (w)'),
        	'limit'	=> 12
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('bola sepak (l)'),
        	'limit'	=> 24
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('bola tampar (l)'),
        	'limit'	=> 14
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('congkak'),
        	'limit'	=> 7
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('dart (berpasukan)'),
        	'limit'	=> 10
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('futsal lelaki (veteran)'),
        	'limit'	=> 12
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('golf'),
        	'limit'	=> 5
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('karom (berpasukan)'),
        	'limit'	=> 12
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('larian kampus'),
        	'limit'	=> 15
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('perbarisan kontinjen'),
        	'limit'	=> 7
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('ping pong (berpasukan)'),
        	'limit'	=> 15
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('sepak takraw (l)'),
        	'limit'	=> 14
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('tarikh tali (l)'),
        	'limit'	=> 16
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('persembahan'),
        	'limit'	=> 12
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('bola tampar (w)'),
        	'limit'	=> 14
    	]);

    	Acara::create([
        	'nama'	=> strtoupper('menembak'),
        	'limit'	=> 3
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
