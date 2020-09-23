<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicineType extends Model
{

    protected $table = 'medicine_types';
    protected $fillable = ['name'];

    // public function medicine(){
    //     return $this->belongsTo('App\Model\Medicine');
    // }

    public function medicines(){
        return $this->hasMany('App\Model\Medicine');
    }
    
    public function pres_medicine_details(){
        return $this->belongsTo('App\Model\PrescriptionMedicineDetail');
    }

}
