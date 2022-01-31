<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdGenders extends Model
{
    protected $fillable = [
        'gender_name',
        'status',
        'created_by',
        'updated_by'
    ];
}
