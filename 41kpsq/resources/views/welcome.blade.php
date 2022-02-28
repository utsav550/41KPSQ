<!DOCTYPE html>
<html lang="zxx">
<script>
    $(document).ready(function() {

        $('.counter').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 7000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

    });
</script>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Manup Template">
    <meta name="keywords" content="Manup, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>41 KPSQ | HOME</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link href="{{ asset('main_asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
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
    <!-- Css gallery -->





    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/css/jquery.scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main_asset/gallery_asset/css/swiper.min.css') }}">




    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('main_asset/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('main_asset/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="./index.html">
                    <img src="{{ asset('main_asset/img/logo1.svg') }}" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.html">Home</a></li>
                        <li><a href="./about-us.html">Post</a></li>
                        <li><a href="./speaker.html">Gallery</a>
                            <ul class="dropdown">
                                <li><a href="#">Jayden</a></li>
                                <li><a href="#">Sara</a></li>
                                <li><a href="#">Emma</a></li>
                                <li><a href="#">Harriet</a></li>
                            </ul>
                        </li>
                        <li><a href="./schedule.html">Events</a></li>

                        <li><a href="./contact.html">Contacts</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @if (session()->has('FRONT_USER_NAME') != null)
                            <li><a href="{{ url('/logoutuser') }}">logout</a></li>
                        @else

                            <li><a href="{{ url('/loginuser') }}">Login</a></li>
                        @endif

                    </ul>
                </nav>
                <!--        <a href="{{ url('/register') }}" class="primary-btn top-btn"><i class="fa fa-ticket"></i> Log-in /Sign Up</a>
        -->
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ asset('main_asset/img/umiya12.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-text">

                        <h2>41 KPSQ<br /> Queensland</h2>
                        <a href="#" class="primary-btn">Buy Ticket</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('main_asset/img/banner.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Counter Section Begin -->
    <section class="counter-section bg-gradient">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="counter-text">

                        <h3>Counting Every People <br /> of 41KPS in Queensland</h3>
                    </div>
                </div>
                <?php
                
                $familycount = DB::table('families')->get();
                
                $member = DB::table('members')->get();
                
                $indi = DB::table('members')
                    ->where('family_head_id', null)
                    ->get();
                
                ?>
                <div class="col-lg-8">
                    <div class="cd-timer" id="countdwn">
                        <div class="cd-item">
                            <span>{{ count($familycount) }}</span>
                            <p>Families</p>
                        </div>
                        <div class="cd-item">
                            <span>{{ count($member) }}</span>
                            <p>Members</p>
                        </div>
                        <div class="cd-item">
                            <span>{{ count($indi) }}</span>
                            <p>individuals</p>
                        </div>
                        <!--           <div class="cd-item">
                            <span>32</span>
                            <p>Seconds</p> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Counter Section End -->

    <!-- Home About Section Begin -->
    <section class="home-about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ha-pic">
                        <img src="{{ asset('main_asset/img/41KPSQ.PNG') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ha-text">
                        <h2>About Community</h2>

                        <p>When I first got into the online advertising business, I was looking for the magical
                            combination that would put my website into the top search engine rankings, catapult me to
                            the forefront of the minds or individuals looking to buy my product, and generally make me
                            rich beyond my wildest dreams! After succeeding in the business for this long, I’m able to
                            look back on my old self with this kind of thinking and shake my head.</p>
                        <ul>
                            <li><span class="icon_check"></span> Write On Your Business Card</li>
                            <li><span class="icon_check"></span> Advertising Outdoors</li>
                            <li><span class="icon_check"></span> Effective Advertising Pointers</li>
                            <li><span class="icon_check"></span> Kook 2 Directory Add Url Free</li>
                        </ul>
                        <a href="#" class="ha-btn">Discover Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home About Section End -->

    <!-- Team Member Section Begin -->
    <section class="team-member-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>People from Villages</h2>
                        <p>These are our top 8 villages</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" >
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
                            <a href="#" class="btn">Know More</a>
                        </div>
                    </div>
        <?php
        if ($i == 7) {
            break;
        }            
        }?>
                </div>
            </div>
    </section>

    <!-- Team Member Section End -->

    <!-- Schedule Section Begin -->
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
                                    <a class="nav-link" data-toggle="tab" href="#tabs{{ $list->id }}"
                                        role="tab">
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
    <!-- Schedule Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section set-bg spad" data-setbg="{{ asset('main_asset/img/pricing-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Ticket Pricing</h2>
                        <p>Get your event ticket plan</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="price-item">
                        <h4>1 Day Pass</h4>
                        <div class="pi-price">
                            <h2><span>$</span>129</h2>
                        </div>
                        <ul>
                            <li>One Day Conference Ticket</li>
                            <li>Coffee-break</li>
                            <li>Lunch and Networking</li>
                            <li>Keynote talk</li>
                            <li>Talk to the Editors Session</li>
                        </ul>
                        <a href="#" class="price-btn">Get Ticket <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="price-item top-rated">
                        <div class="tr-tag">
                            <i class="fa fa-star"></i>
                        </div>
                        <h4>Full Pass</h4>
                        <div class="pi-price">
                            <h2><span>$</span>199</h2>
                        </div>
                        <ul>
                            <li>One Day Conference Ticket</li>
                            <li>Coffee-break</li>
                            <li>Lunch and Networking</li>
                            <li>Keynote talk</li>
                            <li>Talk to the Editors Session</li>
                            <li>Lunch and Networking</li>
                            <li>Keynote talk</li>
                        </ul>
                        <a href="#" class="price-btn">Get Ticket <span class="arrow_right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="price-item">
                        <h4>Group Pass</h4>
                        <div class="pi-price">
                            <h2><span>$</span>79</h2>
                        </div>
                        <ul>
                            <li>One Day Conference Ticket</li>
                            <li>Coffee-break</li>
                            <li>Lunch and Networking</li>
                            <li>Keynote talk</li>
                            <li>Talk to the Editors Session</li>
                        </ul>
                        <a href="#" class="price-btn">Get Ticket <span class="arrow_right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- latest BLog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Latest News</h2>
                        <p>Do not miss anything topic abput the event</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="latest-item set-bg large-item"
                        data-setbg="{{ asset('main_asset/img/blog/latest-b/latest-1.jpg') }}">
                        <div class="li-tag">Marketing</div>
                        <div class="li-text">
                            <h4><a href="./blog-details.html">Improve You Business Cards And Enchan Your Sales</a></h4>
                            <span><i class="fa fa-clock-o"></i> 19th May, 2019</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="latest-item set-bg"
                        data-setbg="{{ asset('main_asset/img/blog/latest-b/latest-2.jpg') }}">
                        <div class="li-tag">Experience</div>
                        <div class="li-text">
                            <h5><a href="./blog-details.html">All users on MySpace will know that there are millions of
                                    people out there.</a></h5>
                            <span><i class="fa fa-clock-o"></i> 19th May, 2019</span>
                        </div>
                    </div>
                    <div class="latest-item set-bg"
                        data-setbg="{{ asset('main_asset/img/blog/latest-b/latest-3.jpg') }}">
                        <div class="li-tag">Marketing</div>
                        <div class="li-text">
                            <h5><a href="./blog-details.html">A Pocket PC is a handheld computer, which features many of
                                    the same capabilities.</a></h5>
                            <span><i class="fa fa-clock-o"></i> 19th May, 2019</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest BLog Section End -->

    <!-- Newslatter Section Begin -->
    <section class="newslatter-section">
        <div class="container">
            <div class="newslatter-inner set-bg" data-setbg="{{ asset('main_asset/img/newslatter-bg.jpg') }}">
                <div class="ni-text">
                    <h3>Subscribe Newsletter</h3>
                    <p>Subscribe to our newsletter and don’t miss anything</p>
                </div>
                <form action="#" class="ni-form">
                    <input type="text" placeholder="Your email">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Newslatter Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Location</h2>
                        <p>Get directions to our event center</p>
                    </div>
                    <div class="cs-text">
                        <div class="ct-address">
                            <span>Address:</span>
                            <p>01 Pascale Springs Apt. 339, NY City <br />United State</p>
                        </div>
                        <ul>
                            <li>
                                <span>Phone:</span>
                                (+12)-345-67-8910
                            </li>
                            <li>
                                <span>Email:</span>
                                info.colorlib@gmail.com
                            </li>
                        </ul>
                        <div class="ct-links">
                            <span>Website:</span>
                            <p>https://conference.colorlib.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cs-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52901.38789495531!2d-118.19465514866786!3d34.03523211493029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2cf71ad83ff9f%3A0x518b28657f4543b7!2sEast%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1579763856144!5m2!1sen!2sbd"
                            height="400" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="partner-logo owl-carousel">
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{ asset('main_asset/img/partner-logo/logo-1.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{ asset('main_asset/img/partner-logo/logo-2.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{ asset('main_asset/img/partner-logo/logo-3.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{ asset('main_asset/img/partner-logo/logo-4.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{ asset('main_asset/img/partner-logo/logo-5.png') }}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{ asset('main_asset/img/partner-logo/logo-6.png') }}" alt="">
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-text">
                        <div class="ft-logo">
                            <a href="./index.html" class="footer-logo">
                                <img style="color: white" src="{{ asset('main_asset/img/footerlogo.png') }}" alt="">
                            </a>

                        </div>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Speakers</a></li>
                            <li><a href="#">Schedule</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        <div class="copyright-text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib.Downloaded from <a href="https://themeslab.org/"
                                        target="_blank">Themeslab</a></a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="ft-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->






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
</body>

</html>
