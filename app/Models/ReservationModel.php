<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = [
        'reservations_number',
        'customer_id', 
        'booking_date',
        'rent_schedule',
        'duration'
    ];

    protected $hidden = [];
}
