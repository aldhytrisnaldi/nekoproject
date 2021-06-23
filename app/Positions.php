<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $fillable = [
        'position_name',
        'division_id'
    ];

    protected $hidden = [
       'updated_at'
    ];
}
