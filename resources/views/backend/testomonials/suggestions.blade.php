@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Suggestions </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>                                                           
                                <th>User Name</th>
                                <th>Subject</th>
                                <th>Suggestions</th>
                                <th>Status</th>
                                <th>Suggestion Date</th>                                                              
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suggestions as $suggestion)
                                
                            <tr>
                                <td>{{ $suggestion->user->name }}</td>
                                <td>{{ $suggestion->subject }}</td>
                                <td>{{ $suggestion->suggestions }}</td>
                                <td>
                                    @if ($suggestion->status == 'pending')
                                        <span class="badge badge-danger">Pending</span>
                                        @elseif ($suggestion->status == 'read')
                                        <span class="badge badge-success">Read</span>
                                        
                                    @endif                                    
                                </td>
                                <td>{{ $suggestion->created_at }}</td>
                                <td>
                                    <a href="{{ route("suggestion.action",[$suggestion->id,'read']) }}" class="btn btn-success">Read</a>
                                    <a href="{{ route('suggestion.action',[$suggestion->id,'delete']) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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