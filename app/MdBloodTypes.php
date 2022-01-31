<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdBloodTypes extends Model
{
    protected $fillable = [
        'blood_type_name',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
       'updated_at'
    ];
}
