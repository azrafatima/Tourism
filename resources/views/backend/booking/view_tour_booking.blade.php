@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tour Booking</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Transport</th>                                
                                <th>Hotel</th>                                
                                <th>Travel Agency</th>                                                                
                                <th>Customer Name</th>
                                <th>Guardian Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>NIC Number</th>
                                <th>Address</th>
                                <th>Covid 19 Vaccine</th>
                                <th>Covid 19 certificate</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tours as $tour)
                                
                            <tr>
                                
                                <td>{{ $tour->transport->name}}</td>
                                <td>{{ $tour->hotel->hotel_name}}</td>
                                <td>{{ $tour->travel->Name}}</td>
                                <td>{{ $tour->name }}</td>                                
                                <td>{{ $tour->guardian_name }}</td>                                
                                <td>{{ $tour->phone }}</td>                                
                                <td>{{ $tour->email }}</td>                                
                                <td>{{ $tour->nic }}</td>                                
                                <td>{{ $tour->address }}</td>                                
                                <td>
                                    {{ ($tour->covid_19_status) ? 'Yes' : 'No' }}
                                </td>
                                <td><img src="{{ asset('backend/images/booking/covid_certificates/covid_19_certificate/'.$tour->covid_19_certificate) }}"  width="100px"height="100px" style="border: 1px solid #000" alt=""></td>
                                <td>{{ $tour->status }}</td>                                

                                
                                <td>
                                    <a href="{{ route('tour.booking.action',[$tour->id,'approve']) }}" class="btn btn-success">Approve</a>
                                    <a href="{{ route('tour.booking.action',[$tour->id,'reject']) }}" class="btn btn-danger">Reject</a>
                                </td>
                                
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>
</div>
</div>



@endsection