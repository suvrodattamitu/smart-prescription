<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicalTest extends Model
{
    protected $table = 'medical_tests';
    protected $fillable = ['name','description'];
}
