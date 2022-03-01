@extends('member/userLayout')

@php

$name = session()->get('FRONT_USER_NAME');
@endphp
<style>
    .card {
        margin-top: 2em;
        padding: 1.5em 0.5em 0.5em;
        height: 250px;
        border-radius: 2em;
        text-align: center;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        float: left;
        margin: 10px 10px 10px 10px
    }

    .card .card-title {
        font-weight: 700;
        font-size: 1.5em;
        height: 90px;
    }

    .card .btn {
        border-radius: 2em;
        background-color: teal;
        color: #ffffff;
        margin-bottom: 50px;
        position: relative;
    }

    .card .btn:hover {
        background-color: rgba(0, 128, 128, 0.7);
        color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

</style>    
@section('container')
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/offcanvas-navbar/">
    <link href="{{asset('main_asset/css/offcanvas.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('main_asset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Population By Village</h1>
      <small></small>
    </div>
  </div>
  
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Top 3 Villages</h6>
    <?php
   
  $pop=[];
  $result = DB::table('villages')->orderBy('pop', 'DESC')->get();
   for($i=0; $i<count($result);$i++){
      $pop[$i+1] = $result[$i]->pop;
      $id = $result[$i]->id;
      if($i == 0){
        $color = "#007bff";
      }
      if($i == 1){
          $color = "#6f42c1";
      }
      if($i == 2){
          $color = "#e28743";
      }
  ?>
  <div class="d-flex text-muted pt-3">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="{{$color}}"/><text x="50%" y="50%" fill="{{$color}}" dy=".3em">32x32</text></svg>

    <p class="pb-3 mb-0 m lh-sm border-bottom" style="padding-left:10px">
        <div class="pb-3 mb-0 l lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
              <strong class="text-gray-dark"> {{ $result[$i]->pop }} Members</strong>
              <a href="#">See All >></a>
            </div>
            <span class="d-block">{{ $result[$i]->village }}</span>
          </div>
      
        </p>
  </div>
             
  <?php
  if ($i == 2) {
      break;
  }            
  }?>
  </div>

  <section class="team-member-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>List of Villages</h2>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                    <?php
        $pop=[];
        $result = DB::table('villages')->orderBy('pop', 'DESC')->get();
        for($i=0; $i<count($result);$i++){
            $pop[$i+1] = $result[$i]->pop;
            $id = $result[$i]->id;
        ?>
                <div class="card" style="width: 15rem;">
                    {{ $result[$i]->pop }}
                    <div class="card-body">
                        <h5 class="card-title">{{ $result[$i]->village }}</h5>
                        <a href="{{url('member/population/village')}}?id={{ $result[$i]->id}}" class="btn">Know More ></a>
                    </div>
                </div>
                <?php     
    }?>
            </div>
        </div>
    </div>
</section>
 
</main>


    <script src="{{asset('main_asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('main_asset/js/offcan.js')}}"></script>
 



@endsection