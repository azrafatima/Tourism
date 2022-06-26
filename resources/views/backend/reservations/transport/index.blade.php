@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tranport Services</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Image</th>                                
                                <th>Name</th>
                                <th>Contact Numeber</th>
                                <th>Description</th>
                                <th>Source Location</th>
                                <th>Destination</th>
                                <th>Price</th>
                                <th>Route</th>
                                <th>Rating</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transports as $transport)
                                
                            <tr>
                                                             
                                <td> 
                                    <img src="{{ asset('backend/images/transports/'.$transport->image) }}"  width="100px"height="100px" style="border: 1px solid #000" alt="">                                  
                                </td>
                                
                                <td>{{ $transport->name }}</td>
                                <td>{{ $transport->phone }}</td>
                                <td>{{ $transport->description }}</td>
                                <td>{{ $transport->Source }}</td>
                                <td>{{ $transport->destination }}</td>
                                <td>{{ $transport->price }}</td>
                                <td>{{ $transport->routes->title }}</td>
                                <td>{{ $transport->rating }}</td>
                                
                                
                                <td>
                                    <a href="{{ route('transport.edit',$transport->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('transport.destroy',$transport->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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