<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/aee_horizontal_logo.png') }}" type="image/x-icon">
    

    <link rel="stylesheet" href="{{ asset('adminlte3.2/plugins/fontawesome-free/css/all.min.css') }} ">
	<link rel="stylesheet" href="{{ asset('adminlte3.2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('adminlte3.2/plugins/toastr/toastr.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('adminlte3.2/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('adminlte3.2/plugins/daterangepicker/daterangepicker.css') }}">
  	<link rel="stylesheet" href="{{ asset('adminlte3.2/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  	<link rel="stylesheet" href="{{ asset('adminlte3.2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> 
  	<link rel="stylesheet" href="{{ asset('adminlte3.2/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> 
  	<link rel="stylesheet" href="{{ asset('adminlte3.2/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  	
    <title>{{ $title  !== "" ? $title : "Employees"}}</title>

</head>
<body class="hold-transition layout-top-nav dark-mode">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-info">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('images/aee_horizontal_logo.png') }}" alt="App LOGO" class="brand-image " style="opacity: .8">
                    {{-- <span class="brand-text font-weight-light text-white">Business Cards</span> --}}
                </a>
        
                {{-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
        
                <!-- SEARCH FORM -->

                @auth
                    <form action="/execute/logout" method="POST" class="form-inline ml-0 ml-md-3">
                        @csrf
                        <button class="btn btn-navbar btn-info" type="submit">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                        
                    </form>
                @endauth
            </div>
        </nav>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                