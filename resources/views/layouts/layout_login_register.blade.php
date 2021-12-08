<!DOCTYPE html>
<html lang="en"
      data-textdirection="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="DokR2JLKHav0V1mDIuslQTFpTmX8uKXVkAx1Liul">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/logo/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">
    <link rel="stylesheet" href="{{asset('vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/ui/prism.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-extended.css')}}">
    <link rel="stylesheet" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('css/components.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/dark-layout.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" href="{{asset('css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" href="{{asset('css/pages/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-laravel.css')}}">
    <link rel="stylesheet" href="{{asset('css/pages/authentication.css') }}">
</head>
<body
    class="vertical-layout vertical-menu-modern 1-column blank-page bg-full-screen-image "
    data-menu="vertical-menu-modern" data-col="1-column" data-layout="light">
<!-- BEGIN: Content-->
@yield('content')
<!-- End: Content-->
<script src="{{asset('vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('vendors/js/ui/prism.min.js')}}"></script>
<script src="{{asset('js/core/app-menu.js')}}"></script>
<script src="{{asset('js/core/app.js')}}"></script>
<script src="{{asset('js/scripts/components.js')}}"></script>

</body>
</html>
