<?php

namespace App\Models\Masterdata;

use Illuminate\Database\Eloquent\Model;

class MMenuTables extends Model
{
    protected $fillable = [
        'menu_name',
        'menu_type_id',
        'parent_id',
        'sort',
        'route',
        'icon',
        'description',
        'active'
    ];
}
