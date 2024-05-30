<?php

namespace App\Http\Controllers;

use App\Models\Featured;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrAboutController extends Controller
{
    public function about()
    {
        $testimonial = Testimonial::latest()->get();
        $featuredCategories = Featured::latest()->get();
        return view('about', compact('testimonial','featuredCategories'));
    }
}
