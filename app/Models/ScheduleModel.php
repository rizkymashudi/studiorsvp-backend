<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $fillable = [
        'date',
        'session_available', 
        'session_reserved', 
        'open_hours', 
    ];

    protected $hidden = [];
}
