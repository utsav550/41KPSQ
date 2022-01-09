@extends('member/userLayout')

@php

$name = session()->get('FRONT_USER_NAME');
@endphp
@section('container')


    <div class="row">

        @foreach ($data as $list)
        @if($list->status == "Availble")
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                    {{ $list->eventName }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" >Price : ${{ $list->price }}</div>
                                <div style="margin-top: 10px"><a href="#" > Buy Now!</a>  </div>
                            </div>
                            
                            <div class="col-auto" style="text-align: center">

                                @php
                                    $date = strtotime($list->date);
                                    $month = date('F', $date);
                                    $day = date('d', $date);
                                    $year = date('Y', $date);
                                @endphp
                                <h4>{{ $day }}</h4>
                                <span style="text-align: center">{{ $month }}</span><br>
                                <span>{{ $year }}</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>


@endsection
