<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Admin Login</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">


  <!-- The fav icon -->

  <link rel="icon"href="{{ URL::asset('backend/img/favicon.ico') }}" type="image/x-icon">

  <!-- Bootstrap Core Css -->

  <link href="{{ URL::asset('backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

  <!-- Waves Effect Css -->

  <link href="{{ URL::asset('backend/plugins/node-waves/waves.css') }}" rel="stylesheet" />

  <!-- Animation Css -->

  <link href="{{ URL::asset('backend/plugins/animate-css/animate.css') }}" rel="stylesheet" />

  <!-- Custom Css -->

  <link href="{{ URL::asset('backend/css/style.css') }}" rel="stylesheet">
  <style type="text/css">
      .new_colour{
        background-color: #2C3539 !important; 
      }
      .logo h3 {
        color: #fff;
        text-align: center;
      }
    </style>
</head>

 <body class="new_colour login-page">

    <div class="login-box">

        <div class="logo">
            <h3>Admin Sign in</h3>
        </div>

        

        <div class="card">

              @if (session('info'))
                  <div class="alert alert-warning" role="alert">
                      <span class="glyphicon" aria-hidden="true"></span>
                      {{ session('info') }}
                  </div>
              @endif 

            <div class="body">
          
                <form id="sign_in" action="{{ route('login.submit') }}" method="post">
                  {{ csrf_field() }}

                    <div class="msg">Sign in to start your session</div>

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="material-icons">email</i>

                        </span>

                        <div class="form-line">

                            <input type="email" class="form-control" name="admin_email" placeholder="Email" required autofocus>

                        </div>

                    </div>

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="material-icons">lock</i>

                        </span>

                        <div class="form-line">

                            <input type="password" class="form-control" name="admin_password" placeholder="Password" required>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-8 p-t-5">                            

                        </div>

                        <div class="col-xs-4">

                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>



    <!-- Jquery Core Js -->
    <script src="{{ URL::asset('backend/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->

    <script src="{{ URL::asset('backend/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{ URL::asset('backend/plugins/node-waves/waves.js') }}"></script>
    <!-- Validation Plugin Js -->
    <script src="{{ URL::asset('backend/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ URL::asset('backend/js/admin.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pagejs/sign-in.js') }}"></script>
</body>

</html>