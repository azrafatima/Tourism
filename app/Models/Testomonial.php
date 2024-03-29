<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testomonial extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','subject','complaint','suggestions','status'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
