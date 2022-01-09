@extends('member/userLayout')

@php

$name = session()->get('FRONT_USER_NAME');

@endphp


@section('container')
<form  action="{{route('member.add')}}" method="POST">
    
    <div class="form-group  col-md-4">
        <input type="text" class="form-control" id="inputAddress" name="id" value="{{$id}}" placeholder="ID" hidden>

        <input type="text" class="form-control" id="inputAddress" name="idv" value="Member ID : {{$id}}" placeholder="ID" readonly>
      </div>
      <div class="form-row">
    <div class="form-group  col-md-6">
        <label for="inputAddress">First Name</label>
        <input type="text" class="form-control" id="inputAddress"  name="fname" value="{{$fname}}" placeholder="First Name">
      </div>
      <div class="form-group  col-md-6">
        <label for="inputAddress">Last Name</label>
        <input type="text" class="form-control" id="inputAddress" name="lname"  value="{{$lname}}" placeholder="Last Name">
      </div>
      </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="email"  value="{{$email}}" placeholder="Email" readonly>
      </div>
      <div class="form-group  col-md-6">
        <label for="inputAddress">Mobile</label>
        <input type="text" class="form-control" id="inputAddress" name="mobile"  value="{{$mobile}}" placeholder="Mobile">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Gender</label>
          <input type="text" class="form-control" id="inputEmail4" name="gender" value="{{$gender}}" placeholder="gender" readonly>
        </div>
        <div class="form-group  col-md-6">
          <label for="inputAddress">Village</label>
          <input type="text" class="form-control" id="inputAddress" name="village"  value="{{$village}}" placeholder="village" readonly>
        </div>
      </div>
    <div class="form-row">
        <div class="form-group  col-md-6">
            <label for="inputAddress">DOB</label>
            <input type="date" class="form-control"  value="{{$dob}}" name="dob" id="inputAddress" readonly>
          </div>
          <div class="form-group  col-md-6">
            <label for="inputAddress">Visa</label>
            <input type="text" class="form-control" id="inputAddress" name="visa"  value="{{$visa}}" placeholder="Visa">
          </div>
          </div>
    <div class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" name="address" value="{{$address}}" placeholder="1234 Main St">
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Suburb</label>
        <input type="text" class="form-control"  value="{{$suburb}}" name="suburb" id="inputCity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control" name="state" value="{{$state}}">
          <option selected  value="{{$state}}"> {{$state}}</option>
          <option>Queensland</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control"  name="postcode" value="{{$postcode}}" id="inputZip">
      </div>
    </div>
    @csrf
    
    <button type="submit" class="btn btn-primary" name="edit">Confirm Changes </button>
  </form>


@endsection