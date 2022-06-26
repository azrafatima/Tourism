@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Package Details</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Image</th>                                
                                <th>Name</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Features</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                
                            <tr>
                                
                                <td><img src="{{ url('backend/images/package/'.$package->package_image) }}"  width="100px"height="100px" style="border: 1px solid #000" alt=""></td>
                                <td>{{ $package->package_name }}</td>
                                <td>{{ $package->package_type }}</td>
                                <td>{{ $package->package_location }}</td>
                                <td>{{ $package->package_price }}</td>
                                <td>{{ $package->package_features }}</td>
                                <td>{{ $package->package_details }}</td>
                                <td>
                                    <a href="{{ route('package.edit',$package->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('package.destroy',$package->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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