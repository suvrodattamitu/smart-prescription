<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicalTestDetail extends Model
{
    protected $table = 'prescription_medical_test_details';
    protected $fillable = ['prescription_id','medical_test_id','description'];
}
