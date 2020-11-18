<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    protected $fillable = [
        'division_name',
    ];

    protected $hidden = [
       'updated_at'
    ];
}
