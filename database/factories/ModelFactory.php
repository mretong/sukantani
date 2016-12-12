<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Peserta::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nama'              => strtoupper($faker->name),
        'noKp'              => $faker->numberBetween(100000, 999999) . $faker->randomElement(array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12')) . $faker->numberBetween(5501, 5999),
        'notel'             => $faker->e164PhoneNumber,
        'jantina'           => $faker->randomElement(array('LELAKI', 'WANITA')),
        'noPekerja'         => $faker->numberBetween(1000, 9999),
        'tarafJawatan'      => $faker->randomElement(array('TETAP', 'SAMBILAN')),
        'gredJawatan'       => $faker->randomElement(array('F', 'E', 'G', 'N', 'FT', 'J', 'H')) . $faker->randomElement([11, 17, 22, 27, 29, 32, 36, 38, 41, 44, 48]),
        'tarikhLantikan'    => $faker->date,
        'vege'              => $faker->randomElement(array('YA', 'TIDAK')),
        'role'              => 'ATLET',
        'noAtlet'           => $faker->randomElement(array('M', 'K', 'D', 'A', 'R', 'F', 'L', 'P', 'T', 'V', 'B', 'C', 'N', 'Q')) . $faker->numberBetween(1, 777),
        'photo'             => 'images/peserta/noPhoto.svg',
        'agensi_id'         => $faker->numberBetween(1, 14),
    ];
});