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
                                <th>Hotel Name</th>
                                <th>Hotel Address</th>
                                <th>Hotel Email Address</th>
                                <th>Hotel Phone Number</th>
                                <th>Hotel Services</th>
                                <th>Hotel Type</th>
                                <th>Hotel Price</th>
                                <th>Hotel Ratings</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                
                            <tr>
                                                             
                                <td> 
                                    <img src="{{ asset('backend/images/hotel/'.$hotel->hotel_images) }}"  width="100px"height="100px" style="border: 1px solid #000" alt="">                                  
                                </td>
                                
                                <td>{{ $hotel->hotel_name }}</td>
                                <td>{{ $hotel->hotel_address }}</td>
                                <td>{{ $hotel->hotel_email }}</td>
                                <td>{{ $hotel->hotel_phone }}</td>
                                <td>{{ $hotel->hotel_services }}</td>
                                <td>{{ $hotel->hotel_type }}</td>
                                <td>{{ $hotel->hotel_price }}</td>
                                <td>{{ $hotel->hotel_rating }}</td>
                                
                                <td>
                                    <a href="{{ route('hotel.edit',$hotel->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('hotel.destroy',$hotel->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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