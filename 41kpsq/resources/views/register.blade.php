<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>41KPSQ - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin_asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin_asset/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action=""  id="frmRegi">
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="fname" id="exampleFirstName"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="lname" id="exampleLastName"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control " name="dob" id="exampleFirstName"
                                            placeholder="dob" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="mobile" id="exampleLastName"
                                            placeholder="mobile" required>
                                            <span style="color: RED" id="mobile_error" class="field_error"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control" aria-label="" name="village" required>
                                        <option selected disabled value="">Select Village</option>
                                        @foreach ($data as $list)       
                                        <option value="{{$list->id}}">{{$list->village}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control" aria-label="" name="gender" required>
                                       
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="other">Other</option>
                                      
                                      </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail"
                                        placeholder="Email Address" required>
                                        <span style="color: RED" id="email_error" class="field_error"></span>
                                </div>
                                <hr>
                                <h4> Additional info </h4>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" id="exampleInputEmail"
                                        placeholder="Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="suburb" id="exampleFirstName"
                                            placeholder="Suburb" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="postcode" id="exampleLastName"
                                            placeholder="Post Code" required>
                                            <span style="color: RED" id="postcode_error" class="field_error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control " name="visa" id="exampleInputEmail"
                                        placeholder="visa" required>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="agree" id="exampleCheck1" required>
                                    <label class="form-check-label" name="agreed" for="exampleCheck1">i agree to share my information with other users.</label>
                                  </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control "
                                            id="exampleInputPassword" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control "
                                            id="exampleRepeatPassword" name="password_confirmation" placeholder="Repeat Password" required>
                                    </div>
                                    <span style="color: RED" id="password_error" class="field_error"></span>
                                </div>
                                <button type="submit" id="btnRegi" class="btn btn-primary btn-user btn-block">
                                    Register Account</button>
                                    <div id="thank_you_msg"></div>
                                    <div class="text-center" style="color: green; margin-top:10px" id="thanks">
                                    </div>
                                </a>
                                <hr>
                                @csrf
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('/loginuser')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin_asset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin_asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin_asset/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('main_asset/js/custom.js')}}"></script>

</body>

</html>