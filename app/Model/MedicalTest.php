<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicalTest extends Model
{
    protected $table = 'medical_tests';
    protected $fillable = ['name','description'];

    // public function medicine(){
    //     return $this->belongsTo('App\Model\Medicine');
    // }

    // public function subtasks(){
    //     return $this->hasMany('App\Model\Subtask');
    // }
}
