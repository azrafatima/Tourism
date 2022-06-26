@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Footer Contact</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                                                
                                <th>City & Country</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Timings</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                
                            <tr>
                                
                                
                                <td>{{ $contact->city }}</td>
                                <td>{{ $contact->phone }}</td>                                
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->timings }}</td>
                                <td>
                                    <a href="{{ route('footer.edit',$contact->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('footer.destroy',$contact->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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