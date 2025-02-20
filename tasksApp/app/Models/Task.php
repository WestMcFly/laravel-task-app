<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name',
        'task_location',
        'time_complexity',
        'materials_required',
        'deadline',
        'priority',
        'category',
    ];
}
