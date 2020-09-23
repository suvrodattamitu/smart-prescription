<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{

    protected $table = 'medicines';
    protected $fillable = ['name', 'description', 'group_id', 'type_id', 'company_id'];

    public function type()
    {
        return $this->belongsTo('App\Model\MedicineType');
    }

    public function group()
    {
        return $this->belongsTo('App\Model\MedicineGroup');
    }

    public function company()
    {
        return $this->belongsTo('App\Model\Company');
    }

    // public function med_pres()
    // {
    //     return $this->hasMany('App\Model\PrescriptionMedicineDetail','medicine_id');
    // }



}
