<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    use HasFactory;
    protected $fillable = ['package_type_name'];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
