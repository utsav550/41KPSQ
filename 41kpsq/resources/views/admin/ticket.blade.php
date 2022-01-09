@extends('admin/layout')

@section('container')



    <!-- Custom fonts for this template -->
    <link href="{{asset('admin_asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('admin_asset/css/sb-admin-2.min.css" rel="stylesheet')}}">

    <!-- Custom styles for this page -->
    <link href="{{asset('admin_asset/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<body id="page-top">
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Event Management</h1>
                    <a href="events/add_event">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create Event</button>
                    </a>
                    </div>
                    
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listed Events</h6>
                        </div>
                        <?php 

                        if(session('message')){
                            ?>
                            <div class="alert alert-success" role="alert">
                            {{ session('message')}}
                          </div>
                            <?php 
                        }?>
                        
                        
                        <div class="row">
                            
                            @foreach ($data as $list)
                            

                            <div class="col-sm-4" style="margin:20px; margin-left:5% ">
                            <div class="card" style="border: 1px solid black;">
                                <div class="card-img-top" style="height: 100px;  background-color:black">
                                    <h1 style="color: white; text-align:center; margin-top:25px">{{$list->eventName}} </h1>
                                </div>
                                <div class="card-body">
                                <h5 class="card-title" style="color:black; text-align:center"> Date : {{$list->date}}</h5>
                                <hr><div class="row">
                                    <div class="col" style="margin:10px; color:black;">Tickets : {{$list->totaltickets}}</div>
                                    <div class="col" style="margin:10px; color:black;">Sold : {{$list->sold}}</div>
                                </div>
                                <div class="row">
                                    <div class="col" style="margin:10px; color:black;">Price : ${{$list->price}}</div>
                                    <div class="col" style="margin:10px; color:black;">Left : {{$list->totaltickets - $list->sold}}</div>
                                </div>
                                <div class="row">
                                    <div class="col" style="margin:10px; color:black;">Time : {{$list->time}}</div>
                                   
                                    
                                </div>
                                <div class="row">
                                    <div class="col" style="margin:10px; color:black;">Place : {{$list->place}}</div>
                                </div>
                                <a href="{{url('admin/ticket/status')}}/{{$list->id}}" class="btn btn-primary">{{$list->status}}</a>
                                </div>
                            </div>
                            </div>
                            @endforeach
                        </div>
                        </div>   
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<!-- Core plugin JavaScript-->
    <script src="{{asset('admin_asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    
    <!-- Page level plugins -->
    <script src="{{asset('admin_asset/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin_asset/js/demo/datatables-demo.js')}}"></script>

</body>

</html>

@endsection



								
							