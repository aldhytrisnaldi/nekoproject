<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'name',
        'rin',
        'ein',
        'gender',
        'religion',
        'height',
        'weight',
        'placeofbirth',
        'dateofbirth',
        'marriage_status',
        'number_of_children',
        'last_education',
        'province',
        'city',
        'districts',
        'subdistricts',
        'address',
        'phone',
        'email',
        'departement_id',
        'division_id',
        'position_id',
        'created_at'
    ];

    protected $hidden = [
       'updated_at'
    ];
}
