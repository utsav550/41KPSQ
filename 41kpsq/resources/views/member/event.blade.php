@extends('member/userLayout')
@php

$name = session()->get('FRONT_USER_NAME');
@endphp
@section('container')
    <div class="card mb-3">
        @foreach ($data as $list)

            <div style="background-color: black; height:15vh">
                <h1 style="text-align: center; color:white; font-size:40px; text-transform:uppercase; margin-top:3%">
                    {{ $list->eventName }}</h1>
            </div>
            <div class="card-body">
                <h5 class="card-title" style="color:black; text-align:center"> Date : {{ $list->date }}</h5>
                <hr>
                <div class="row" style="text-align:center">
                    <div class="col" style="margin:10px; color:black;">Tickets : {{ $list->totaltickets }}</div>
                    <div class="col" style="margin:10px; color:black;">Sold : {{ $list->sold }}</div>
                </div>
                <div class="row" style="text-align:center">
                    <div class="col" style="margin:10px; color:black;">Price : ${{ $list->price }}</div>
                    <div class="col" style="margin:10px; color:black;">Left :
                        {{ $list->totaltickets - $list->sold }}</div>
                </div>
                <div class="row" style="text-align:center">
                    <div class="col" style="margin:10px; color:black;">Time : {{ $list->time }}</div>


                </div>
                <div class="row" style="text-align:center">
                    <div class="col" style="margin:10px; color:black;">Place : {{ $list->place }}</div>
                </div>
                <a href="#" class="btn btn-primary">{{ $list->status }}</a>
                <a href="{{ url('member/ticket')}}/{{ $list->id }}" class="btn btn-primary">Buy Tickets!</a>
            </div>

    

    @endforeach
</div>
    </div>
@endsection
