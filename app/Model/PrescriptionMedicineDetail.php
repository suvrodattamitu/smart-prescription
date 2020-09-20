<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicineDetail extends Model
{
    protected $table = 'prescription_medicine_details';
    protected $fillable = ['prescription_id','type_id','medicine_id','eating_time_breakfast','eating_time_lunch','eating_time_dinner','eating_term','days','duration'];
}
