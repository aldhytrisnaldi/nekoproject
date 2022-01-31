<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    protected $fillable = [
        'division_name',
        'departement_id',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
       'updated_at'
    ];
}
