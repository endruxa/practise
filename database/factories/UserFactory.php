<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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

$factory->define(App\User::class, function (Faker $faker)
{
    static $password;
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role'           => 1
    ];
});

$factory->defineAs(App\User::class, 'admin', function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
        'role' => 2
    ];
});

$factory->defineAs(App\Category::class, 'admin', function (Faker $faker)
{
    return [
     'title'     => $faker->title(),
     'slug'      => $faker->slug(),
     'published' => 1
     ];
});

$factory->defineAs(App\Article::class, 'admin', function (Faker $faker)
{
    return [
     'title'             => $faker->title(),
     'slug'              => $faker->slug(),
     'published'         => 1,
     'description_short' => $faker->text(25),
     'description'       => $faker->realText(100),
     'meta_title'        => $faker->text(25),
     'meta_description'  => $faker->text(25),
     'meta_keyword'      => $faker->text(25),
     'user_id'           => 1
     ];
});


