<?php

use App\User;
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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\User::class, 'admin', function (Faker\Generator $faker) {
    static $password;

    return [
        'role' => App\User::ROLE_ADMIN
     ];
});

$factory->define(App\Entities\Condominio::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'no_condominio' => $faker->name,
        
    ];
});

$factory->define(App\Entities\Pessoa::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'no_pessoa' => $faker->name,
        
    ];
});

$factory->define(App\Entities\Apartamento::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'bloco' => rand(1,6),
        'nu_apt' => rand(100, 1402),

    ];
});
