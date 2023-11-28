<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diary</title>

     <!-- Favicon -->
     <link rel="icon" type="image/x-icon" href="{{ asset('image/book-png-18.ico') }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{  asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> 

        <!-- Sweetalert cdn-->

    <link rel="stylesheet" href="sweetalert2.min.css">

       <!-- Dropify CSS-->

       <link rel="stylesheet" href="{{ asset('css/dropify.css') }}">

     <!-- jQuery Scripts -->

     {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        
    

</head>
<body id="page-top">
