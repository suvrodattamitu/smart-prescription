<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions';
    protected $fillable = ['patient_id','suggestion'];

    public function patient() {
        return $this->belongsTo('App\Model\Patient');
    }

    public function prescription_tests() {
        return $this->hasMany('App\Model\PrescriptionMedicalTestDetail');
    }

    public function prescription_medicines() {
        return $this->hasMany('App\Model\PrescriptionMedicineDetail');
    }
}
