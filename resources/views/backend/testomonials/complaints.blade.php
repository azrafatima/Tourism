@extends('backend.admin_master')
@section('content')





<div class="content-body">
    <div class="container-fluid">
        
        
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Complaints </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>                                                           
                                <th>User Name</th>
                                <th>Subject</th>
                                <th>Complaints</th>
                                <th>Status</th>
                                <th>Complaint Date</th>                                                              
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                
                            <tr>
                                <td>{{ $complaint->user->name }}</td>
                                <td>{{ $complaint->subject }}</td>
                                <td>{{ $complaint->complaint }}</td>
                                <td>
                                    @if ($complaint->status == 'pending')
                                        <span class="badge badge-danger">Pending</span>
                                        @elseif ($complaint->status == 'resolved')
                                        <span class="badge badge-success">Resolved</span>
                                        @elseif ($complaint->status == 'rejected')
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif                                    
                                </td>
                                <td>{{ $complaint->created_at }}</td>
                                <td>
                                    <a href="{{ route("complaint.action",[$complaint->id,'resolve']) }}" class="btn btn-success">Resolve</a>
                                    <a href="{{ route('complaint.action',[$complaint->id,'reject']) }}" class="btn btn-danger">Reject</a>
                                    <a href="{{ route('complaint.action',[$complaint->id,'delete']) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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