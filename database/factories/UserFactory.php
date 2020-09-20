<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Model\MedicalTest;
use App\Model\Patient;
use App\Model\Company;
use App\Model\MedicineType;
use App\Model\MedicineGroup;
use App\Model\Medicine;
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

$factory->define(Patient::class, function (Faker $faker) {
    return [

        'name'             =>$faker->name,
        'visiting_no'      => rand(1,100),
        'age'              => rand(10,100),
        'regi_no'          => rand(30,1000),
        'gender'           => rand(0,1),
        'marital_status'   => rand(0,1),
        'address'          => $faker->address,
        'mobile'           => '01700000000',
        'height'           => rand(100,200),
        'weight'           => rand(30,100),
        'c_c'              => $faker->sentence,
        'on_exam'          => $faker->sentence,
        'p_a_exam'         => $faker->sentence,
        
    ];
});

$factory->define(Company::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,
        'description' => $faker->paragraphs(1,true),
    ];
});

$factory->define(MedicineType::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,
    ];
});

$factory->define(MedicineGroup::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,
        'description' => $faker->paragraphs(1,true),
    ];
});

$factory->define(Medicine::class, function (Faker $faker) {
    return [

        'name'          => $faker->name,
        'group_id'      => rand(1,10),
        'type_id'       => rand(1,10),
        'company_id'    => rand(1,10),
        'description'   => $faker->sentence,
        
    ];
});