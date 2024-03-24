@extends('Layouts.main')
@section('title','About Page')
@section('content')




    <!-- Slider -->
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
           
            @foreach ($banner as $data)
           
            <div class="text-center item bg-img" data-overlay-dark="2" data-background="{{ asset($data->image) }}">
                <div class="v-middle caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h4>{{$data -> subheading }}</h4>
                                <h1>{{$data -> heading }}</h1>
                                <div class="butn-light mt-30 mb-30"> <a href="#" data-scroll-nav="1"><span>View More</span></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach




            <!-- <div class="text-center item bg-img" data-overlay-dark="2" data-background="img/slider/3.jpg">
                <div class="v-middle caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <span>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                </span>
                                <h4>Unique Place to Relax & Enjoy</h4>
                                <h1>The Perfect Base For You</h1>
                                <div class="butn-light mt-30 mb-30"> <a href="#" data-scroll-nav="1"><span>View More</span></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="img/slider/1.jpg">
                <div class="v-middle caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <span>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                </span>
                                <h4>The Ultimate Luxury Experience</h4>
                                <h1>Enjoy The Best Moments of Life</h1>
                                <div class="butn-light mt-30 mb-30"> <a href="#" data-scroll-nav="1"><span>View More</span></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->



        </div>
        <!-- slider reservation -->
        <div class="reservation">
            <a href="tel:8551004444">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="flaticon-call"></i>
                </div>
                <div class="call"><span>966 583 939 270</span> <br>For Enquiery</div>
            </a>
        </div>
    </header>








    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">

                    <div class="section-subtitle">The National Supplies Traders</div>
                    <div class="section-title">NATIONAL Supplies Trading EST</div>
                    <p>
                        from Dammam & Jubail as a rapidly expanding organization offering wide range of Material Trading,
                         Brands, Fitting Materials, Safety Materials, Equipment Rental. As a result of our continuous<br>

                    pursuit for recognition and devoted customer service during the past few years, we have secured 
the confidence and appreciation of our clients. Our manpower supply involves qualified and 
technically skilled staff in the field of Civil. Mechanical and Instrumental etc. In different 
categories such as Engineers, Technicians, Welder and skilled and unskilled workers. <br>
We provide all facilities to the workforce as per Saudi Labor Law and this setup has proved to 
be the strategy of our persistent success. We have also an efficient group of persons for 
management.</p>
                   
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                    <img src="{{url('national/img/rooms/10.jpg')}}" alt="" class="mt-90 mb-30">
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                    <img src="{{url('national/img/rooms/2.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms -->



    <section class="rooms1 section-padding bg-darkblack" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Branded Accessories</div>
                    <div class="section-title">Featured Categories</div>
                </div>
            </div>
            <div class="row">


            @foreach ($categories as $catadata)
                
                <div class="col-md-4">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="{{ asset($catadata->image) }}" alt=""> </div>
                        <div class="con">
                            <h5><a href="room-details.html">{{$catadata ->heading }}</a></h5>
                            <div class="line"></div>

                        </div>
                    </div>
                </div>

            @endforeach




            </div>
        </div>
    </section>





    <!-- Testiominals -->
    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{url('national/img/slider/2.jpg')}} "
            data-overlay-dark="3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="testimonials-box">
                            <div class="head-box">
                                <h6>Testimonials</h6>
                                <h4>What Client's Say?</h4>
                                <div class="line"></div>
                            </div>
                            <div class="owl-carousel owl-theme">

                            @foreach ($testimonial as $testidata)
                                <div class="item">
                                    <span class="quote"><img src="{{url('national/img/quot.png')}}  " alt=""></span>
                                    <p>{{$testidata ->content }}</p>
                                    <div class="info">
                                        <div class="author-img"> <img src="{{$testidata ->image }}" alt=""> </div>
                                        <div class="cont"> <span><i class="star-rating"></i><i
                                                    class="star-rating"></i><i class="star-rating"></i><i
                                                    class="star-rating"></i><i class="star-rating"></i></span>
                                            <h6>{{$testidata ->name }}</h6> <span>{{$testidata ->designination }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services -->


    
    <section class="services section-padding">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Branded Accessories</div>
                    <div class="section-title">Popular Products</div>
                </div>
            </div>


  

            @foreach ($PopularProducts as $index => $populardata)
    @if($loop->first)
        <div class="row">
            <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                <div class="img left">
                    <a href="restaurant.html"><img src="{{ $populardata->image }}" alt=""></a>
                </div>
            </div>
            <div class="col-md-6 p-0 bg-darkblack valign animate-box" data-animate-effect="fadeInRight">
                <div class="content">
                    <div class="cont text-left">
                        <div class="info">
                            <h6>Discover</h6>
                        </div>
                        <h4>{{ $populardata->title }}</h4>
                        <p>{{ $populardata->description }}</p>
                        <div class="butn-dark"> <a href="bath-tab.html"><span>View More</span></a> </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-6 bg-darkblack p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                <div class="content">
                    <div class="cont text-left">
                        <div class="info">
                            <h6>Experiences</h6>
                        </div>
                        <h4>{{ $populardata->title }}</h4>
                        <p>{{ $populardata->description }}</p>
                        <div class="butn-dark"> <a href="bath-tab.html"><span>View More</span></a> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInRight">
                <div class="img left">
                    <a href="restaurant.html"><img src="{{ $populardata->image }}" alt=""></a>
                </div>
            </div>
        </div>
    @endif
@endforeach


           
           
        </div>
    </section>

    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{url('national/img/slider/2.jpg')}} "
            data-overlay-dark="2">
            <div class="container">
                <div class="row">
                    <!-- Reservation -->
                    <div class="col-md-5 mb-30 mt-30">
                        <p><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i
                                class="star-rating"></i><i class="star-rating"></i></p>
                        <h5>Each of our guest rooms feature a private bath, wi-fi, cable television and include full
                            breakfast.</h5>
                        <div class="reservations mb-30">
                            <div class="icon color-1"><span class="flaticon-call"></span></div>
                            <div class="text">
                                <p class="color-1">Reservation</p> <a class="color-1" href="tel:966583939270">966 583 939 270</a>
                            </div>
                        </div>
                       
                    </div>
                    <!-- Booking From -->
                    <div class="col-md-5 offset-md-2">
                        <div class="booking-box">
                            <div class="head-box">
                                <h6>Contact Us</h6>
                                <h4>For Enquiery</h4>
                            </div>
                            <div class="booking-inner clearfix">
                                <form action="" class="form1 clearfix">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input1_wrapper">
                                                <label>Name</label>
                                                <div class="input1_inner">
                                                    <input type="text" class="form-control input " placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input1_wrapper">
                                                <label>Email Id</label>
                                                <div class="input1_inner">
                                                    <input type="text" class="form-control input "
                                                        placeholder="Email Id">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input1_wrapper">
                                                <label>Phone</label>
                                                <div class="input1_inner">
                                                    <input type="text" class="form-control input "
                                                        placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input1_wrapper">
                                                <label>Phone</label>
                                                <div class="input1_inner">
                                                    <textarea type="text" class="form-control input text-content "
                                                        placeholder="Enquiery"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <button type="submit" class="btn-form1-submit mt-15">Send Enquiery</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Clients -->
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="owl-carousel owl-theme">

                    @foreach ($brand as $branddata)

                        <div class="clients-logo">
                            <a href="#0"><img src="{{ asset($branddata->image) }}" alt=""></a>
                        </div>

                    @endforeach
    
                       
                    </div>
                </div>
            </div>
        </div>
    </section>










@endsection 