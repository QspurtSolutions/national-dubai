<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Testimonial;
use App\Models\Brand;
use App\Models\PopularProducts;
use Illuminate\Http\Request;

class FrHomeController extends Controller
{
    
    public function index()
    {
        $banner = Banner::latest()->get();
        $categories = Categories::latest()->get();
        $testimonial = Testimonial::latest()->get();
        $brand = Brand::latest()->get();
        $PopularProducts = PopularProducts::latest()->get();
        return view('index', compact('banner', 'categories','testimonial','brand','PopularProducts'));
    }


    



}
