<?php

use Illuminate\Database\Seeder;
use App\Model\MedicalTest;
use App\User;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        factory(App\User::class)->create();
        factory(MedicalTest::class,10)->create();
    }
}
