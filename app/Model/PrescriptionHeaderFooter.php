<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrescriptionHeaderFooter extends Model
{
    protected $table = 'prescription_header_footers';
    protected $fillable = ['header','footer'];
}
