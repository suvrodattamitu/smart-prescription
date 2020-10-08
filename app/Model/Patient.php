<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = ['visiting_no','name','age','regi_no','gender','marital_status','address','mobile','height','weight','c_c','on_exam','p_a_exam','is_prescribed'];

    public function prescriptions() {
        return $this->hasMany('App\Model\Prescription')->latest();
    }


}
