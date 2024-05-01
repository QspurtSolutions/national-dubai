 <!-- Preloader -->
 <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper">
                <a class="logo" href="index.html"> <img src="{{url('national/img/logo.png')}} " class="logo-img" alt=""> </a>
                <!-- <a class="logo" href="index.html"> <h2>THE CAPPA <span>Luxury Hotel</span></h2> </a> -->
            </div>
            <!-- Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{url('index')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('about')}}">About</a></li>


                    @php
        $categories = getCategories();
        @endphp

        @foreach ($categories as $category)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">{{ $category->heading }}<i class="ti-angle-down"></i></a>
            <ul class="dropdown-menu">
                @php
                $subcategories = $category->subcategories;
                @endphp

                @foreach ($subcategories as $subcategory)
                <li><a href="{{ route('productDetails', $subcategory->id) }}" class="dropdown-item"><span>{{ $subcategory->title }}</span></a></li>
                @endforeach
            </ul>
        </li>
        @endforeach


                    <!-- <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Kitchen<i class="ti-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('single-products')}}" class="dropdown-item"><span>Kitchen Mixer </span></a></li>
                           
                        </ul>
                    </li>

                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Bathroom <i class="ti-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="bath-tab.html" class="dropdown-item"><span>Basin Mixer</span></a></li>
                            <li><a href="bath-tab.html" class="dropdown-item"><span>Bidet Mixer</span></a></li>
                            <li><a href="bath-tab.html" class="dropdown-item"><span>Shower Mixer</span></a></li>
                            <li><a href="bath-tab.html" class="dropdown-item"><span>Bath Spout</span></a></li>
                        </ul>  
                    </li> -->

                     <li class="nav-item"><a class="nav-link" href="{{ route('getAllProducts') }}">All Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('contact')}}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>


        




