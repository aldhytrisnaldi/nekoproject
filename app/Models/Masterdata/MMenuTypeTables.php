<?php

namespace App\Models\Masterdata;

use Illuminate\Database\Eloquent\Model;

class MMenuTypeTables extends Model
{
    protected $fillable = [
        'menu_type_name',
        'active'
    ];
}
