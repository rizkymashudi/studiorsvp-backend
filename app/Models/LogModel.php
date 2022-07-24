<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    use HasFactory;

    protected $table = 'activity_log_admin';
    protected $fillable = [
        'action',
        'user',
        'description'
    ];

    protected $hidden = [];
}
