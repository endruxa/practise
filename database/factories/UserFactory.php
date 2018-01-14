<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->defineAs(App\User::class, 'admin', function (Faker $faker)
{
    return [
        'name' => 'admin',
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Roles::class, 'admin', function (Faker $faker)
{
    return [
        'name' => 'Администратор',
        'slug' => 'admin',
        'description' => 'Администратор с полными правами',
        'group' => 'администраторы',
    ];
});

$factory->defineAs(App\UserAdditionals::class, 'admin', function (Faker $faker)
{
    $faker = \FAker\Factory::create('ru_RU');
    return [
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'patronomic' => 'Иванович',
    ];
});