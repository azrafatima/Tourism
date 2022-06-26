<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_type_id',
        'package_name',
        'package_location',
        'package_price',
        'package_features',
        'package_details',
        'package_image',
    ];
    use HasFactory;

    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }
}
