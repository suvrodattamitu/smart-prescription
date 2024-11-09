<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicalTest extends Model
{
    protected $table = 'prescription_medical_test';
    protected $fillable = ['prescription_id','medical_test_id','description'];

    public function prescription() {
        return $this->belongsTo('App\Model\Prescription');
    }

    public function test() {
        return $this->belongsTo('App\Model\MedicalTest','medical_test_id');
    }

}
