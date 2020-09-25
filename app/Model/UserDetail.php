<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['user_id', 'image', 'phone', 'designation', 'address', 'bio','gender','website_url','education'];

}
