<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'assets';
    protected $fillable = [
        'item_name',
        'slug', 
        'type', 
        'quantity', 
        'image'
    ];

    protected $hidden = [];

}
