@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Travel Agency</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
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
                            @foreach ($travels as $travel)
                                
                            <tr>
                                
                                <td>{{ $travel->travel->Name}}</td>
                                <td>{{ $travel->name }}</td>                                
                                <td>{{ $travel->guardian_name }}</td>                                
                                <td>{{ $travel->phone }}</td>                                
                                <td>{{ $travel->email }}</td>                                
                                <td>{{ $travel->nic }}</td>                                
                                <td>{{ $travel->address }}</td>                                
                                <td>
                                    {{ ($travel->covid_19_status) ? 'Yes' : 'No' }}
                                </td>
                                <td><img src="{{ asset('backend/images/booking/covid_certificates/covid_19_certificate/'.$travel->covid_19_certificate) }}"  width="100px"height="100px" style="border: 1px solid #000" alt=""></td>
                                <td>{{ $travel->status }}</td>                                

                                
                                <td>
                                    <a href="{{ route('travel.booking.action',[$travel->id,'approve']) }}" class="btn btn-success">Approve</a>
                                    <a href="{{ route('travel.booking.action',[$travel->id,'reject']) }}" class="btn btn-danger">Reject</a>
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