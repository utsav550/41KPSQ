@extends('member/userLayout')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@php

$name = session()->get('FRONT_USER_NAME');
$idses = session()->get('FRONT_USER_ID');
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

    @foreach ($data as $list)
        @if (!empty($list))
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-success text-uppercase mb-1">
                                {{ $list->fname }}
                                {{ $list->lname }}
                                &nbsp;
                            </div> wants to add you in family.
                        </div>
                        <div class="col-auto">
                            <a href="{{ url('member/family/acc/' . $idses . '') }}" class="btn btn-success btn-circle">
                                <i class="fas fa-check"></i>
                            </a>
                        </div>
                        <div class="col-auto" style="padding-left: 20px">

                            <a href="{{ url('member/family/req/' . $idses . '') }}" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

@endsection
