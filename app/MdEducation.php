<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdEducation extends Model
{
    protected $fillable = [
        'education_name',
        'status',
        'created_by',
        'updated_by'
    ];
}
