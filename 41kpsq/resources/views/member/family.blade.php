@extends('member/userLayout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@php

$name = session()->get('FRONT_USER_NAME');
$idv = session()->get('FRONT_USER_ID');
@endphp
@section('container')

    <?php 

if(session('message')){
    ?>
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    <?php 
}?>
    <?php 

if(session('alert')){
    ?>
    <div class="alert alert-danger" role="alert">
        {{ session('alert') }}
    </div>
    <?php 
}?>

    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            Add Family Member
        </a>
        <form id="">
        <a class="btn btn-primary" data-toggle="collapse" href="#link" role="button" aria-expanded="false"
            aria-controls="collapseExample">
           
            Link Family Member
        </a>
    </form>

    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">

            <form action="{{ url('member/family/add') }}/{{ $idv }}" method="POST">
                
                <P style="color: red">Only use this form if family member don't have account on this site!</P>
                <P style="color: green">Use link family member button for existing user!</P>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">First Name</label>
                        <input type="text" class="form-control" name="fname" id="inputEmail4" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Last Name</label>
                        <input type="text" class="form-control" id="inputPassword4" name="lname" placeholder="Last Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Date</label>
                        <input type="date" class="form-control" id="inputAddress2" name="dob" placeholder="">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Gender</label>
                        <select id="inputState" name=gender class="form-control">
                            <option selected>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Relation</label>
                        <select id="inputState" class="form-control" name="relation">
                            <option selected>Choose...</option>
                            <option value="wife">Wife</option>
                            <option value="husbund">Husbund</option>
                            <option value="mother">Mother</option>
                            <option value="father">Father</option>
                            <option value="brother">Brother</option>
                            <option value="sister">Sister</option>
                            <option value="kids">Kid</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add </button>
            </form>
        </div>
    </div>
    <form id="link">
    <div class="collapse" id="link">
        <input type="text" class="form-control" name="id" id="link" placeholder="Seach ID:">
        <span id="result"></span>@csrf
    <button type="submit" class="btn btn-primary">Add </button>
    </div>
    </form>
    </div>


    </p>

    <div class="row">

        @foreach ($data2 as $list)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{ $list->fname }} &nbsp;{{ $list->lname }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $list->relation }}</div>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url('member/family/delete/' . $list->id . '') }}"><i class="fas fa-trash"
                                        style="color: red; font-size:30px"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        <!-- Earnings (Monthly) Card Example -->



    </div>



@endsection
