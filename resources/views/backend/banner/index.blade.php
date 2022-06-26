@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Banner</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Image</th>                                
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Description</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                
                            <tr>
                                
                                <td><img src="{{ url('backend/images/banner/'.$banner->image) }}"  width="100px"height="100px" style="border: 1px solid #000" alt=""></td>
                                <td>{{ $banner->title }}</td>
                                <td>{{ $banner->subtitle }}</td>                                
                                <td>{{ $banner->description }}</td>
                                <td>
                                    <a href="{{ route('banner.edit',$banner->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('banner.destroy',$banner->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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