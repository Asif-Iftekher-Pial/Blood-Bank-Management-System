<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web App Landing Page Website Tempalte | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/fav.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/fav.jpg') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawsom-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/grid-gallery/css/grid-gallery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>

<body>
   
    {{-- header section --}}
    @include('frontend.layouts.header')
    {{-- header section end --}}

    @yield('main_frontend')
    <!-- ################# Slider Starts Here#######################--->

    
   




    <!--*************** Footer  Starts Here *************** -->
   
    @include('frontend.layouts.footer')

</body>

{{-- Scripts --}}
@include('frontend.layouts.scripts')

</html>
