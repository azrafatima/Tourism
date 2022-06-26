@extends('frontend.master_layout')
@section('main')
<style>
    input{
        text-transform: none;
    }
</style>
<section class="travel" id="travel">

    <div class="heading">
        <span>Booking Section</span>
    </div>

    <div class="box-container">
        
        <div class="card " style="background-color: #222; color:#29d9d5;">
            <div class="card-header">
                <h3>Tour Booking Form</h3>
            </div>
            <div class="card-body" >
                <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Transport</label>
                        <select name="transport_id" class="form-control" style="background-color: #222; color:#fff; border:0.2rem solid #29d9d5">
                            <option value="">Select Transport</option>
                            @foreach($transports as $transport)
                                <option value="{{ $transport->id }}">{{ $transport->name }}</option>
                            @endforeach
                            @error('transport_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Hotel</label>
                        <select name="hotel_id" class="form-control" style="background-color: #222; color:#fff; border:0.2rem solid #29d9d5">
                            <option value="">Select Hotel</option>
                            @foreach($hotels as $hotel)
                                <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                            @endforeach
                        </select>
                        @error('hotel_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6" >
                    <div class="form-group mb-4">
                        <label for="">Travel Agency</label>
                        <select name="travel_agency_id" class="form-control" style="background-color: #222; color:#fff; border:0.2rem solid #29d9d5">
                            <option value="">Select Travel Agency</option>
                            @foreach($travel_agencies as $travel_agency)
                                <option value="{{ $travel_agency->id }}" >{{ $travel_agency->Name }}</option>
                            @endforeach
                        </select>
                        @error('travel_agency_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" >
                    <div class="form-group mb-4">
                        <label for="">Packages</label>
                        <select name="travel_agency_id" class="form-control" style="background-color: #222; color:#fff; border:0.2rem solid #29d9d5">
                            <option value="">Select packages</option>
                            @foreach($travel_agencies as $travel_agency)
                                <option value="{{ $travel_agency->id }}" >{{ $travel_agency->Name }}</option>
                            @endforeach
                        </select>
                        @error('travel_agency_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Name" >
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">Guardian Name</label>
                        <input type="text" class="form-control" name="guardian_name"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Guardian Name" >
                        @error('guardian_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                       <div class="form-group mb-3"  >
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Guardian Name" >
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter Email" >
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3"  >
                        <label for="">NIC Number</label>
                        <input type="text" class="form-control" name="nic"  style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" placeholder="Enter NIC Number" >
                        @error('nic')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <textarea class="form-control" style="background-color: #222; color:#fff;   border: 0.2rem solid #29d9d5;" rows="3"name="address"></textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="">Have you received the covid-19 vaccination</label>
                        <select name="covid_19_status" class="form-control" style="background-color: #222; color:#fff; border:0.2rem solid #29d9d5">
                            <option value="">Select Covid-19 Vaccine Status</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        
                        </select>
                        @error('covid_19_status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Covid 19 Certificate</label>
                        <input type="file" class="form-control" style="background-color: #222; color:#fff; text-transfrom:lower-case;   border: 0.2rem solid #29d9d5;" name="covid_19_certificate">
                        @error('covid_19_certificate')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>  
                        </div>
                </div>         
                    <button type="submit" class="btn btn-primary">Tour Booking</button>
                </form>
            </div>
        </div>
        
        
    </div>
    
    


</section>

@endsection
