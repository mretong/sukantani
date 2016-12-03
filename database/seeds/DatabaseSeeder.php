<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AgensiTableSeeder::class);
        $this->call(AcaraTableSeeder::class);
        
        factory(App\Peserta::class, 1500)->create();
        // factory(App\Penyertaan::class, 6500)->create();

        $pesertas = App\Peserta::all();
        $faker = new Faker\Generator;
        foreach($pesertas as $peserta) {
            
            $acara = Array();
            for($i=0; $i<$faker->numberBetween(1,3); $i++){
                array_push($acara, $faker->numberBetween(1, 20));
            }

            $peserta->acara->attach($acara);
        }
    }
}
