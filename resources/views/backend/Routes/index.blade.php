@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Routes </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                                           
                                <th>Name</th>
                                <th>Source Location</th>
                                <th>Destination</th>
                                <th>Visiting Spots</th>
                                <th>Description</th>                                                              
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($routes as $route)
                                
                            <tr>
                            
                                
                                <td>{{ $route->title }}</td>
                                <td>{{ $route->source }}</td>
                                <td>{{ $route->destination }}</td>
                                <td>{{ $route->visiting_spots }}</td>
                                <td>{{ $route->description }}</td>
                                
                                
                                
                                <td>
                                    <a href="{{ route('route.edit',$route->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('route.destroy',$route->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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