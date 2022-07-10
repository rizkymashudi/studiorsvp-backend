<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubReservationModel extends Model
{
    use HasFactory;

    protected $table = 'sub_reservations';
    protected $fillable = [
        'reservation_id',
        'rent_date',
        'duration',
        'total_duration'
    ];

    protected $hidden = [];
}
