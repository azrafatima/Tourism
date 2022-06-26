<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBooking extends Model
{
    use HasFactory;
    protected $table = 'customer_bookings';
    protected $fillable = ['transport_id','user_id','hotel_id','travel_agency_id','package_id','name','guardian_name','phone','email','nic','address','covid_19_status','covid_19_certificate'];
    public function transport()
    {
        return $this->belongsTo(Transports::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotels::class);
    }
    public function travel()
    {
        return $this->belongsTo(TravelAgency::class,'travel_agency_id','id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
