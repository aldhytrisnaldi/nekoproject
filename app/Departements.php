<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    protected $fillable = [
        'departement_name',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
       'updated_at'
    ];
}
