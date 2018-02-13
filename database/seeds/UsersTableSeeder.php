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
            'agensi_id'     => '1',
            'status'        => '1'
        ]);

        User::create([
            'name'          => strtoupper('akmal'),
            'email'         => 'mretong@gmail.com',
            'password'      => bcrypt('akmal'),
            'agensi_id'     => '1',
            'status'        => '1'
        ]);
    }
}
