<?php

use Illuminate\Database\Seeder;
use App\Model\MedicalTest;
use App\Model\Patient;
use App\Model\Company;
use App\Model\MedicineType;
use App\Model\MedicineGroup;
use App\Model\Medicine;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        factory(App\User::class)->create();
        factory(MedicalTest::class,10)->create();
        factory(Patient::class,10)->create();
        factory(Company::class,10)->create();
        factory(MedicineType::class,10)->create();
        factory(MedicineGroup::class,10)->create();
        factory(Medicine::class,10)->create();

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
