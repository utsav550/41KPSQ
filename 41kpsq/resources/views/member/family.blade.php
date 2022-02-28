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

    @if (count($data2) < 1)
        
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    Add Family Member
                </a>

                <a class="btn btn-primary" data-toggle="collapse" href="#link" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    Link Family Member
                </a>
            </p>
           
      
    @else
        @foreach ($data2 as $list)
        @endforeach
        @if ($list->head_id != $idv)
            <div class="alert alert-danger" role="alert">
                You have joined the family! Only Family manager can add or remover members.
            </div>
        @else
            <p>
                <a  class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    Add Family Member
                </a>
           
           
                <a class="btn btn-primary" data-toggle="collapse" href="#link" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    Link Family Member
                </a>
            </p>
        @endif


        <div class="row">

            @foreach ($data2 as $list)

                @if ($list->head_id != $idv)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ $list->fname }} &nbsp;{{ $list->lname }}</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $list->relation }}</div>

                                    </div>

                                    <i class="fa fa-sign-out" aria-hidden="true"></i>

                                    <div class="col-auto">
                                        @if ($list->family_status == 'accepted')
                                            <i class="fas fa-link" style="color: green; font-size:30px"></i>

                                        @elseif($list->family_status == 'requested')
                                            <p> Request Sent</p>
                                            <i class="fas fa-link" style="color: blue; font-size:30px"></i>
                                        @else
                                            <i class="fas fa-user" style="color: green; font-size:30px"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($list->head_id == $idv)
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
                                        @if ($list->family_status == 'accepted')
                                            <a href="{{ url('member/family/remove/' . $list->id . '') }}"><i
                                                    class="fas fa-link" style="color: green; font-size:30px"></i></a>

                                        @elseif($list->family_status == 'requested')
                                            <p> Request Sent</p>
                                            <a href="{{ url('member/family/remove/' . $list->id . '') }}"><i
                                                    class="fas fa-link" style="color: blue; font-size:30px"></i></a>
                                        @else
                                            <a href="{{ url('member/family/delete/' . $list->id . '') }}"><i
                                                    class="fas fa-trash" style="color: red; font-size:30px"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @if ($list->head_id != $idv)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">

                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Exit Family</div>

                                </div>

                                <div class="col-auto">

                                    <a href="{{ url('member/family/remove/' . $idv . '') }}"><i
                                            class="fas fa-sign-out-alt" style="font-size:30px"></i></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    @endif


    <!-- Earnings (Monthly) Card Example -->



    </div>





    <div class="collapse" id="collapseExample">
        <div class="card card-body">

            <form action="{{ url('member/family/add') }}/{{ $idv }}" method="POST">
                @csrf
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
    <div class="collapse" id="link">
        <div class="card card-body">
        <form action="{{ url('member/family/link') }}/{{ $idv }}" method="POST">
            @csrf
            <P style="color: green">Use this for existing users only!</P>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4">Member ID</label>
                    <input type="text" class="form-control" name="memberid" id="inputEmail4" placeholder="ID">
                </div>
                <div class="form-group col-md-2">
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

    <script src="{{ asset('main_asset/js/custom.js') }}"></script>
@endsection
