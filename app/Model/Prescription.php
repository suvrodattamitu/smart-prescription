<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions';
    protected $fillable = ['patient_id','suggestion'];
}
