@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Package Type</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>                                                          
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packageTypes as $type)
                            <tr>
                                <td>{{ $type->package_type_name }}</td>
                                <td>
                                    <a href="{{ route('package.type.edit',$type->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('package.type.destroy',$type->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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