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
                <table class="table table-bordered" style="font-size: 1.2rem;">
                    <thead style="color: #29d9d5">
                        <tr>
                            <th>Transport</th>                                
                            <th>Hotel</th>                                
                            <th>Travel Agency</th>
                            <th>Package </th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody style="color: #fff">
                        @foreach ($tours as $tour)
                            
                        @if($tour->transport_id != null && $tour->hotel_id != null && $tour->travel_agency_id != null )
                            <tr>
                                <td>{{$tour->transport->name}}</td>
                                <td>{{$tour->hotel->hotel_name}}</td>
                                <td>{{$tour->travel->Name}}</td>
                                <td></td>
                                <td style="font-size: 1.5rem">
                                    @if($tour->status == 'pending')
                                    <span class="badge bg-info">{{ $tour->status }}</span>
                                    @elseif($tour->status == 'Approved')
                                    <span class="badge bg-success">{{ $tour->status }}</span>
                                    @elseif($tour->status == 'Rejected')
                                    <span class="badge bg-danger">{{ $tour->status }}</span>
                                    @endif    
                                </td>
                            </tr>
                            @else
                        <tr>
                            @if($tour->transport_id != null)
                            <td>{{ $tour->transport->name}}</td>
                            @else
                            <td></td>
                            @endif
                            @if($tour->hotel_id != null)
                            <td>{{ $tour->hotel->hotel_name}}</td>
                            @else
                            <td></td>
                            @endif
                            @if($tour->travel_agency_id != null)
                            <td>{{ $tour->travel->Name}}</td>
                            @else
                            <td></td>
                            @endif
                            @if($tour->package_id != null)
                            <td>{{ $tour->package->package_name}}</td>
                            @else
                            <td></td>
                            @endif
                            <td style="font-size: 1.5rem">
                            @if($tour->status == 'pending')
                                <span class="badge bg-info">{{ $tour->status }}</span>
                                @elseif($tour->status == 'Approved')
                                <span class="badge bg-success">{{ $tour->status }}</span>
                                @elseif($tour->status == 'Rejected')
                                <span class="badge bg-danger">{{ $tour->status }}</span>
                                @endif
                            
                            </td>                            
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        
        
    </div>
    
    


</section>

@endsection
