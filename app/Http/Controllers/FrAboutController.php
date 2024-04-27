<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrAboutController extends Controller
{
    public function about()
    {
        $testimonial = Testimonial::latest()->get();
        return view('about', compact('testimonial'));
    }
}
