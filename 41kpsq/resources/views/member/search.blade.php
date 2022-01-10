@extends('member/userLayout')

@section('container')

<input type="text" class="form-control" name="id" id="link" placeholder="Seach ID:">
<span id="result"></span>@csrf
<button type="submit" class="btn btn-primary">Add </button>
   

    <div id="="></div>
@endsection

<script src="{{asset('main_asset/js/custom.js')}}"></script>