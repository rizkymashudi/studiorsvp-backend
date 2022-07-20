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
        'duration',
        'total_pay',
        'reservation_status'
    ];

    protected $hidden = [];

    public function customer(){
        return $this->belongsTo(CustomerModel::class, 'customer_id');
    }
}
