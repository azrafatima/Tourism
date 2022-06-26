@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Home Slider</h4>
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
                            @foreach ($homeSliders as $homeSlider)
                                
                            <tr>
                                
                                <td><img src="{{ url('backend/images/homeslider/'.$homeSlider->image) }}"  width="100px"height="100px" style="border: 1px solid #000" alt=""></td>
                                <td>{{ $homeSlider->title }}</td>
                                <td>{{ $homeSlider->subtitle }}</td>                                
                                <td>{{ $homeSlider->description }}</td>
                                <td>
                                    <a href="{{ route('home.slider.edit',$homeSlider->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('home.slider.destroy',$homeSlider->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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