<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $fillable = [
        'position_name',
    ];

    protected $hidden = [
       'updated_at'
    ];
}
