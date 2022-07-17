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
        'open_hours', 
        'close_hour'
    ];

    protected $hidden = [];

    public function subSchedule(){
        return $this->hasMany(SubScheduleModel::class, 'schedule_id', 'id');
    }
}
