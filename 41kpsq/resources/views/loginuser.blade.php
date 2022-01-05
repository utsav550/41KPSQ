<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="41_kpsq_login">
    <meta name="author" content="">

    <title>41 KPSQ log-in</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_asset/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
@php
    
if(isset($_COOKIE['email_login']) && isset($_COOKIE['password_login'])){
    $user = $_COOKIE['email_login'];
    $pass = $_COOKIE['password_login'];
    $remember = "checked='checked'";
}
else{
    $user ="";
    $pass ="";
    $remember = "";
}

@endphp

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="sidebar-brand-text mx-3">{{ Config::get('constant.site_name') }}
                                        </h1>
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" id="frmlogin">
                                       
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                                id="exampleInputEmail" name="email_login" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{$user}}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"
                                                id="exampleInputPassword" name="password_login" value="{{$pass}}"placeholder="Password"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="rememberme"{{$remember}} id="customCheck">
                                                <label class="custom-control-label"  for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" id="btnlogin">Log-in</button>
                                            <div class="text-center">
                                                <div id="login_msg" style="margin-top: 10px; color:red"></div>
                                            </div>
                                        @csrf
                                        <hr>
                                        <?php 
                                        if(session('error')){
                                        ?>
                                        <div class="alert alert-denger" role="alert">
                                            {{ session('message') }}
                                        </div>
                                        <?php 
                                        }?>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{url('/register')}}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_asset/js/sb-admin-2.min.js') }}"></script>
    <script src="{{asset('main_asset/js/custom.js')}}"></script>

</body>

</html>
