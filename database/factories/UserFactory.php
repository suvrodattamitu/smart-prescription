<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Model\MedicalTest;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$MdnSm//i6/0U1x.DjJPaPeiV1nyVhMZAwuFyILn2cw/j31f29Zg6e', // 12345678
        'remember_token' => Str::random(10),
    ];
});

$factory->define(MedicalTest::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,
        'description' => $faker->paragraphs(1,true),
    ];
});
