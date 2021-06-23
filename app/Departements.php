<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    protected $fillable = [
        'departement_name',
    ];

    protected $hidden = [
       'updated_at'
    ];
}
