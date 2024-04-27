<?php

namespace App\Http\Controllers;
use App\Models\PopularProducts;
use App\Models\Brand;
use Illuminate\Http\Request;

class FrpopularproductsController extends Controller
{
    


    public function products()
    {
        $brand = Brand::latest()->get();
        $popularproducts = PopularProducts::latest()->get();
        return view('banner','products', compact('popularproducts'));
    }



}
