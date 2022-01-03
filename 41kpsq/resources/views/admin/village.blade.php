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
                        <h1 class="h3 mb-2 text-gray-800">Village Management</h1>
                    <a href="village/add">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Village</button>
                    </a>
                    </div>
                    
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listed Villages</h6>
                        </div>
                        <?php 

                        if(session('message')){
                            ?>
                            <div class="alert alert-success" role="alert">
                            {{ session('message')}}
                          </div>
                            <?php 
                        }?>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Village Name</th>
                                            <th> Action </th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Village Name</th>
                                            <th> Action </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $list)
                                        
                                        <tr>
                                            <td>{{$list->id}}</td>
                                            <td>{{$list->village}}</td>
                                            <td><a href="{{url('admin/village/manage_village/')}}/{{$list->id}}" style="color: green"> Change</a>  &nbsp &nbsp &nbsp &nbsp <a href="{{url('admin/village/delete/')}}/{{$list->id}}"><i class="fas fa-trash" style="color: red"></i></a></td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
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