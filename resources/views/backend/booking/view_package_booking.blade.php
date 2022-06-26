@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Package</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Package</th>                                
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
                            @foreach ($packages as $package)
                                
                            <tr>
                                
                                <td>{{ $package->package->name}}</td>
                                <td>{{ $package->name }}</td>                                
                                <td>{{ $package->guardian_name }}</td>                                
                                <td>{{ $package->phone }}</td>                                
                                <td>{{ $package->email }}</td>                                
                                <td>{{ $package->nic }}</td>                                
                                <td>{{ $package->address }}</td>                                
                                <td>
                                    {{ ($package->covid_19_status) ? 'Yes' : 'No' }}
                                </td>
                                <td><img src="{{ asset('backend/images/booking/covid_certificates/covid_19_certificate/'.$package->covid_19_certificate) }}"  width="100px"height="100px" style="border: 1px solid #000" alt=""></td>
                                <td>{{ $package->status }}</td>                                

                                
                                <td>
                                    <a href="{{ route('package.booking.action',[$package->id,'approve']) }}" class="btn btn-success">Approve</a>
                                    <a href="{{ route('package.booking.action',[$package->id,'reject']) }}" class="btn btn-danger">Reject</a>
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