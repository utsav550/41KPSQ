@extends('admin/layout')
@section('container')
    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/css/jquery.scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main_asset/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/style.css') }}" type="text/css">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Gallery Management</h1>
    </div>

    <a href="{{ url('admin/events') }}">
        <span class="btn btn-primary">
            << Back</span>
    </a>
    <hr>
    <?php 

    if(session('message')){
        ?>
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    <?php 
    }?>
    <br>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-2 text-gray-800">Select Event and images to upload on Gallery</h2>
    </div>

    <form action="{{ route('gallery.add') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-control" aria-label="" name="event_id" id="eveid" required>
                <option selected disabled value="">Select Event</option>
                @foreach ($data as $list)
                    <option value="{{ $list->id }}">{{ $list->name }} : {{ $list->date }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <br>
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="image" name="image" multiple>
        </div>


        <hr>

        <button type="submit" class="btn btn-primary" name="addgallery">Confirm</button>
        </div>

        <input type="hidden" name="id" value="" />
        <input type="hidden" name="sold" value="" />
    </form>
    <section class="schedule-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2> Memories Together</h2>
                        <p>Do not miss anything about the events</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="schedule-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs" role="tab">
                                    <h5>All Events</h5>
                                    <p> Images</p>
                                </a>
                            </li>
                            @foreach ($data as $list)
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs{{ $list->id }}" role="tab">
                                        <h5>{{ $list->name }}</h5>
                                        <p>{{ $list->date }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs" role="tabpanel">
                                <div class="container-fluid photos">
                                    <div class="row align-items-stretch">
                                        @foreach ($data as $list)
                                            @foreach ($img as $list2)
                                                @if ($list->id == $list2->event_id)
                                                    <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
                                                        <a href="{{ asset("/storage/gallery/$list2->name") }}"
                                                            class="d-block photo-item" data-fancybox="gallery">
                                                            <img src="{{ asset("/storage/gallery/$list2->name") }}"
                                                                alt="Image" class="img-fluid">
                                                                <div class="tag" style="
                                                                    float: left;
                                                                    position: absolute;
                                                                    right: 20px;
                                                                    bottom: 20px;
                                                                    z-index: 1000;
                                                                    padding: 5px;">
                                                                   
                                                                   <a href="{{url('admin/gallery/delete')}}/{{$list2->id}}"><i class="fas fa-trash" style="color: red; font-size:30px"></i></a>
                                                                </div>
                                                            <div class="photo-text-more">
                                                                <span class="icon icon-search"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @foreach ($data as $list)
                                <div class="tab-pane" id="tabs{{ $list->id }}" role="tabpanel">
                                    <div class="container-fluid photos">
                                        <div class="row align-items-stretch">
                                            @foreach ($img as $list2)
                                                <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
                                                    @if ($list->id == $list2->event_id)
                                                        <a href="{{ asset("/storage/gallery/$list2->name") }}"
                                                            class="d-block photo-item" data-fancybox="gallery">
                                                            <img src="{{ asset("/storage/gallery/$list2->name") }}"
                                                                alt="Image" class="img-fluid">
                                                                <div class="tag" style="
                                                                    float: left;
                                                                    position: absolute;
                                                                    right: 20px;
                                                                    bottom: 20px;
                                                                    z-index: 1000;
                                                                    padding: 5px;">
                                                                   
                                                                   <a href="{{url('admin/gallery/delete')}}/{{$list2->id}}"><i class="fas fa-trash" style="color: red; font-size:30px"></i></a>
                                                                </div>
                                                            <div class="photo-text-more">
                                                                <span class="icon icon-search"></span>
                                                            </div>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </section>




    <script src="{{ asset('main_asset/gallery_asset/js/aos.js') }}"></script>

    <script src="{{ asset('main_asset/gallery_asset/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('main_asset/gallery_asset/js/swiper.min.js') }}"></script>
    <script src="{{ asset('main_asset/gallery_asset/js/jquery.scrollbar.js') }}"></script>
    <script src="{{ asset('main_asset/gallery_asset/js/main.js') }}"></script>
    <!-- Js Plugins -->
    <script src="{{ asset('main_asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('main_asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('main_asset/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('main_asset/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('main_asset/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('main_asset/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('main_asset/js/main.js') }}"></script>
    <script src="{{ asset('main_asset/js/custom.js') }}"></script>

@endsection
