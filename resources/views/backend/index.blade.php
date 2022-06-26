@extends('backend.admin_master')
@section('content')
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="3000">
                        <img src="{{ asset('backend/images/dashboard/1.jpg') }}" style="height: 33.13rem" class="d-block w-100"  alt="...">
                      </div>
                      <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ asset('backend/images/dashboard/2.jpg') }}" style="height: 33.13rem" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ asset('backend/images/dashboard/3.jpg') }}" style="height: 33.13rem" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection