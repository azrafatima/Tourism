<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transports extends Model
{
    use HasFactory;
    protected $fillable = ['name','route_id','description','phone','Source','destination','price','rating','image'];
    public function routes()
    {
        return $this->belongsTo(Routes::class,'route_id','id');
    }
}
