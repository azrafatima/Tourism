@extends('frontend.master_layout')
@section('main')

<section class="travel" id="travel">

    <div class="heading">
        <span>Complaint Section</span>
    </div>

    <div class="box-container">
        
        <div class="card" style="background-color: #222; color:#29d9d5;">
            <div class="card-header">
                <h3>View All Complaint</h3>
            </div>
            <div class="card-body" >
                <table class="table table-bordered">
                    <thead style="color: #29d9d5">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Complaint Status</th>
                            
                        </tr>
                    </thead>
                    <tbody style="color: #fff">
                        @foreach($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->id }}</td>
                            <td>{{ $complaint->user->name }}</td>
                            <td>{{ $complaint->subject }}</td>
                            <td>{{ $complaint->complaint }}</td>
                            <td>@if( $complaint->status == 'resolved' ) <span class="badge bg-success">{{ $complaint->status }}</span> @elseif( $complaint->status =='pending') <span class="badge bg-danger"> {{ $complaint->status }} </span> @endif</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        
    </div>
    
    


</section>

@endsection
