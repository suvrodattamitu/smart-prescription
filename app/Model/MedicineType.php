<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicineType extends Model
{
    protected $table = 'medicine_types';
    protected $fillable = ['name'];
}
