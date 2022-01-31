<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdEmployeeStatuses extends Model
{
    protected $fillable = [
        'employee_status_name',
        'status',
        'created_by',
        'updated_by'
    ];
}
