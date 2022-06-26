@extends('frontend.master_layout')
@section('main')

<section class="travel" id="travel">

    <div class="heading">
        <span>Suggestions Section</span>
    </div>

    <div class="box-container">
        
        <div class="card" style="background-color: #222; color:#29d9d5;">
            <div class="card-header">
                <h3>View All Suggestion</h3>
            </div>
            <div class="card-body" >
                <table class="table table-bordered">
                    <thead style="color: #29d9d5">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>suggestion Status</th>
                            
                        </tr>
                    </thead>
                    <tbody style="color: #fff">
                        @foreach($suggestions as $suggestion)
                        <tr>
                            <td>{{ $suggestion->id }}</td>
                            <td>{{ $suggestion->user->name }}</td>
                            <td>{{ $suggestion->subject }}</td>
                            <td>{{ $suggestion->suggestions }}</td>
                            <td>@if( $suggestion->status == 'read' ) <span class="badge bg-success">{{ $suggestion->status }}</span> @elseif( $suggestion->status =='pending') <span class="badge bg-danger"> {{ $suggestion->status }} </span> @endif</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        
    </div>
    
    


</section>

@endsection
