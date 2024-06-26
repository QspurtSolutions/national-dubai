<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\SubCategory;
use App\Models\SubCategoryImage;

class FrProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAllProducts()
    {
        $sub_categories = SubCategory::get();
        return view ('products', compact('sub_categories'));
    }

    public function productDetails($id)
    {
        $product_details = SubCategory::find($id)->first();
        $ProductGallery = SubCategoryImage::where('sub_category_id',$id)->get();
        return view ('single-products', compact('product_details','ProductGallery'));
    }
}


