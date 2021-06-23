<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    protected $fillable = [
        'division_name',
        'departement_id'
    ];

    protected $hidden = [
       'updated_at'
    ];
}
