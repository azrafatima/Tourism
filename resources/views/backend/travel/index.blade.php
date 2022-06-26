@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Travel Agencies</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Image</th>                                
                                <th>Name</th>
                                <th>License Number</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Tourism Department</th>
                                <th>Traveling Area</th>
                                <th>Ratings</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($travelAgencies as $travel)
                                
                            <tr>                                
                                <td><img src="{{ url('backend/images/travels/'.$travel->image) }}"  width="100px"height="100px" style="border: 1px solid #000" alt=""></td>
                                <td>{{ $travel->Name }}</td>
                                <td>{{ $travel->license_Number }}</td>
                                <td>{{ $travel->address }}</td>
                                <td>{{ $travel->phone_Number }}</td>
                                <td>{{ $travel->email }}</td>
                                <td>{{ $travel->tourism_department }}</td>
                                <td>{{ $travel->traveling_area }}</td>
                                <td>{{ $travel->ratings }}</td>
                                
                                <td>
                                    <a href="{{ route('travel.agency.edit',$travel->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('travel.agency.destroy',$travel->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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