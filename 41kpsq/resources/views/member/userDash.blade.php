@extends('member/userLayout')
@php

$name=session()->get('FRONT_USER_NAME');
@endphp
@section('container')
<?php 

if(session('message')){
    ?>
    <div class="alert alert-success" role="alert">
    {{ session('message')}}
  </div>
    <?php 
}?>
@endsection