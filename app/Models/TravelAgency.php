<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelAgency extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'license_Number',
        'address',
        'phone_Number',
        'email',
        'tourism_department',
        'traveling_area',
        'ratings',
        'image',
    ];
}
