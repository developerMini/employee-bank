<!DOCTYPE html>

  <html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{$meta_title}}</title>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

    <!-- The fav icon -->

    <link rel="icon"href="{{ URL::asset('backend/img/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap Core Css -->

    <link href="{{ URL::asset('backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->

    <link href="{{ URL::asset('backend/plugins/node-waves/waves.css') }}"  rel="stylesheet" />
 
    <!-- Animation Css -->

    <link href="{{ URL::asset('backend/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->

    <link href="{{ URL::asset('backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Sweetalert Css -->

    <link href="{{ URL::asset('backend/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Bootstrap FileInput -->
    <link href="{{ URL::asset('backend/plugins/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->

    <link href="{{ URL::asset('backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->

    <link href="{{ URL::asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- Bootstrap Material Datetime Picker Css -->    

     <link href="{{ URL::asset('backend/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

    <!-- Custom Css -->

    <link href="{{ URL::asset('backend/css/style.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('backend/css/theme-teal.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
  </head>


    <body class="theme-teal">

    <!-- Page Loader -->

      <div class="page-loader-wrapper">

          <div class="loader">

              <div class="preloader">

                  <div class="spinner-layer pl-teal">

                      <div class="circle-clipper left">

                          <div class="circle"></div>

                      </div>

                      <div class="circle-clipper right">

                          <div class="circle"></div>

                      </div>

                  </div>

              </div>
             

              <p>Admin</p>
          

          </div>

      </div>

      <!-- #END# Page Loader -->

      <!-- Overlay For Sidebars -->

      <div class="overlay"></div>

      <!-- #END# Overlay For Sidebars -->

      <!-- Top Bar -->

      <nav class="navbar">
          <div class="container-fluid">
              <div class="navbar-header">              
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ route('home') }}">
                  ADMIN 
                </a>
              </div>

              <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right"> 
                  {{--<li><a href="{{ route('profile') }}" title="My Profile"><i class="material-icons">person</i></a></li>--}}
                  <li><a href="{{ route('logout') }}"><i class="material-icons">input</i></a></li>
                </ul>
              </div>
          </div>
      </nav>
      <!-- #Top Bar -->