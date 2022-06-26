<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_name',
        'hotel_address',
        'hotel_email',
        'hotel_phone',
        'hotel_services',
        'hotel_type',
        'hotel_price',
        'hotel_rating',
        'hotel_images',
    
    ];
}
