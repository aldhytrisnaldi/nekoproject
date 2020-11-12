<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $fillable = [
        'name', 'phone', 'placeofbirth', 'dateofbirth', 'address'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
