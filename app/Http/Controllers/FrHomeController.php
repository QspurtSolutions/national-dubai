<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrHomeController extends Controller
{
    
    public function index()
    {
        $banner = Banner::latest()->get();
        $categories = Categories::latest()->get();
        $testimonial = Testimonial::latest()->get();
        return view('index', compact('banner', 'categories','testimonial'));
    }



}
