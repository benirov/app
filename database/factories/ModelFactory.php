<?php
use App\master;
use App\User;
use App\Login;
use App\company;
use App\binnacle;
use Illuminate\Support\Facades\App;
use Faker\Generator;

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(master::class, function(Faker\Generator $faker){
  return [
        'typeUser' => 1,
        'permittingUser' => 1000010000

  ];
});


$factory->define(User::class, function (Faker\Generator $faker) {

    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'lastname' => $faker->name,
        'age' => rand(1, 99),
        // 'typeUser' => $faker->numberBetween($min = 1, $max = 4),
        // 'permittingUser' => rand(1, 123456),
        'tokenUser' => User::generateToken(),
        'remember_token' => str_random(10),
        'fkIdMaster' => master::inRandomOrder()->first()->id
    ];
});

$factory->define(Login::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'password' => $password ?: $password = bcrypt('secret'),
        'fkIdUser' => User::inRandomOrder()->first()->id
    ];
});

$factory->define(company::class, function(Faker\Generator $faker){
  return [
      'name' => $faker->name,
      'url' => 'pruebas.com',
      'fkIdUser' => User::inRandomOrder()->first()->id
  ];
});

$factory->define(binnacle::class, function(Faker\Generator $faker){
  return [
        'time' => $faker->dateTime($max = 'now', $timezone = null),
        'action'=> $faker->text(),
        'fkIdUser' => User::inRandomOrder()->first()->id

  ];
});
