<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => strtoupper('suhairi'),
            'email'         => 'suhairi81@gmail.com',
            'password'      => bcrypt('suhairi'),
            'agensi_id'     => '1'
        ]);

        User::create([
        	'name' 			=> strtoupper('kada'),
        	'email'			=> 'kada@gmail.com',
        	'password'		=> bcrypt('kada'),
        	'agensi_id'		=> '2'
    	]);




    }
}
