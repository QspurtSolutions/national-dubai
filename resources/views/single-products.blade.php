
@extends('Layouts.main')
@section('title','About Page')
@section('content')




<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3"
        data-background="img/slider/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h5>Products</h5>
                    <h1>{{$product_details->title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact -->

    <!-- Image Gallery -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">{{$product_details->title}}</div>
                    <div class="section-title">{{$product_details->title}}</div>
                </div>
                <!-- 3 columns -->
                @foreach($ProductGallery as $gallery)
                <div class="col-md-4 gallery-item">
                    <a href="{{ asset(Storage::url($gallery->image_path)) }}" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="{{ asset(Storage::url($gallery->image_path)) }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                @endforeach
       
            </div>
        </div>
    </section>
   

    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="img/slider/2.jpg"
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
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/1.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/2.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/3.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/4.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/5.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/6.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/7.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/8.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/9.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/10.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/11.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/12.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/13.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/14.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/15.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/16.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/17.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/18.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/19.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/20.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/21.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/22.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/23.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/24.PNG" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="img/brands/26.PNG" alt=""></a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection