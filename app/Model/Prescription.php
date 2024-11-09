<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions';
    protected $fillable = ['patient_id','suggestion', 'c_c', 'on_exam', 'pa_exam'];

    public function patient() {
        return $this->belongsTo('App\Model\Patient');
    }

    // public function prescription_tests() {
    //     return $this->hasMany('App\Model\PrescriptionMedicalTestDetail');
    // }

    public function medicines() {
        return $this->belongsToMany('App\Model\Medicine');
        //return $this->hasMany('App\Model\PrescriptionMedicineDetail');
    }
}
