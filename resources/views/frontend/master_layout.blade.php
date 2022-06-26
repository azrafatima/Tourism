<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kashmir Tourism Website</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- bootstrap css cdn link  -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    
    <link href="{{ asset('frontend/plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
   
    
</head>
<body>
    
<!-- header section starts  -->
@include('frontend.body.header')

<!-- header section ends -->
{{-- Main Starts --}}
@yield('main')
{{-- Main Ends --}}

<!-- footer section starts  -->

@include('frontend.body.footer')


<!-- footer section ends -->


 <!-- custom js file link  -->
 <script src="{{ asset('frontend/js/script.js') }}" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
{{-- bootstrap js link --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js
"></script>
<script src="{{ asset('frontend/plugins/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/toastr/js/toastr.init.js') }}"></script>



<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
  
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
  
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
  
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
        }
    @endif
  </script>

<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

</script>


  

</body>
</html>