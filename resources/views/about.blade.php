@extends('Layouts.main')
@section('title','About Page')
@section('keywords','Mobile App Development, Social Media Marketing services, Website Development Company,
Product Development Company, Cloud Computing Services, E-Commerce Development Company, ERP Solutions,
Best SEO Services, Software Development Company, Web Designing Company ')
@section('description','Ivory Technologies,one of the best web designing companyin UAE offers various services
like affordable web development, product development & cloud computing services, ERP solutions, social
media marketing & SEO services in UAE.Ivory Technologies,one of the best web designing companyin UAE
offers various services like affordable web development, product development & cloud computing services,
ERP solutions, social media marketing & SEO services in UAE.')
@section('content')






    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
        data-background="{{url('national/img/slider/1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>National Supplies Traders</h5>
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>



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
                    <!-- call -->
                    <!-- <div class="reservations">
                        <div class="icon"><span class="flaticon-call"></span></div>
                        <div class="text">
                            <p>Reservation</p> <a href="tel:855-100-4444">855 100 4444</a>
                        </div>
                    </div> -->
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp"> <img src="img/rooms/8.jpg" alt=""
                        class="mt-90 mb-30"> </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp"> <img src="img/rooms/2.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing -->
    <section class="pricing section-padding bg-darkblack">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="section-subtitle"><span>Branded Accessories</span></div>
                    <div class="section-title">Featured Categories</div>
                    <p class="color-2">The best prices for your relaxing vacation. The utanislen quam nestibulum ac
                        quame odion elementum sceisue the aucan.</p>
                    <p class="color-2">Orci varius natoque penatibus et magnis disney parturient monte nascete ridiculus
                        mus nellen etesque habitant morbine.</p>
                    <div class="reservations mb-30">
                        <div class="icon"><span class="flaticon-call"></span></div>
                        <div class="text">
                            <p class="color-2">For information</p> <a href="tel:855-100-4444">855 100 4444</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="owl-carousel owl-theme">
                        @foreach($featuredCategories as $featured)
                        <div class="pricing-card">
                            <img src="{{$featured->image}}" alt="">
                            <div class="desc">
                                <div class="name">{{$featured->title}}</div>
                                
                                <ul class="list-unstyled list">
                                    <li><i class="ti-check"></i>{{$featured->pointone}}</li>
                                    <li><i class="ti-check"></i> {{$featured->pointtwo}}</li>
                                    <li><i class="ti-close unavailable"></i>{{$featured->pointthree}}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="pricing-card">
                            <img src="img/restaurant/2.jpg" alt="">
                            <div class="desc">
                                <div class="name">Wash Basin</div>
                                
                                <ul class="list-unstyled list">
                                    <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                    <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                    <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- <div class="pricing-card">
                            <img src="img/restaurant/3.jpg" alt="">
                            <div class="desc">
                                <div class="name">Plumbing</div>
                                
                                <ul class="list-unstyled list">
                                    <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                    <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                    <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- <div class="pricing-card">
                            <img src="img/restaurant/4.jpg" alt="">
                            <div class="desc">
                                <div class="name">Mechanical </div>
                                
                                <ul class="list-unstyled list">
                                    <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                    <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                    <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
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








@endsection