<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubScheduleModel extends Model
{
    use HasFactory;

    protected $table = 'sub_schedule';
    protected $fillable = [
        'schedule_id',
        'studio_reserved'
    ];

    protected $hidden = [];

    public function schedule(){
        return $this->belongsTo(ScheduleModel::class, 'schedule_id');
    }
}
