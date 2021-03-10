<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

        <title>SIMPEN - @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('jquery.dataTables.css')}}"/>

    <script src="{{asset('https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js')}}"></script>



    <script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/demo/demo2/base/scripts.bundle.js')}}" type="text/javascript"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="{{asset('jquery.dataTables.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>


    <link rel="stylesheet" href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}"
          type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/vendors/base/vendors.bundle.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/demo/demo2/base/style.bundle.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/demo/demo2/media/img/logo/favicon.ico')}}"/>
    <link rel="shortcut icon" href="assets/demo/demo2/media/img/logo/favicon.ico" />

</head>
<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    @include('component/header')
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
        <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
            <div class="m-grid__item m-grid__item--fluid m-wrapper">

                @yield('content')
            </div>
        </div>
    </div>
    @include('component/footer')
</div>
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
</div>


<script type="text/javascript" src="{{asset('assets/autonumeric/autoNumeric.js')}}"></script>

</body>
</html>
