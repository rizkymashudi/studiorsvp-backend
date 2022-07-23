<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    use HasFactory;

    protected $table = 'reports';
    protected $fillable = [
        'reservation_id',
        'payment_total',
        'total_duration'
    ];

    protected $hidden = [];

    public function reservation(){
        return $this->belongsTo(ReservationModel::class, 'reservation_id');
    }
}
