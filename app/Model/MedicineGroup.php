<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicineGroup extends Model
{
    protected $table = 'medicine_groups';
    protected $fillable = ['name','description'];

    public function medicines(){
        return $this->hasMany('App\Model\Medicine');
    }

}
