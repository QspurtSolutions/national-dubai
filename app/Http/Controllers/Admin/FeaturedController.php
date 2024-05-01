<?php
namespace App\Http\Controllers\Admin;
use App\Models\Categories;
use App\Models\SubCategory;
use App\Models\Featured;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeaturedController extends Controller
{
    public function index()
    {
        $featured_categories = Featured::get();
        return view('admin.featured_categories.index', compact('featured_categories'));
    }


    public function create()
    {
        return view('admin.featured_categories.create', [
            'categories'  => Categories::get(),
            'featured_categories' => new Featured()
        ]);
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pointone'=> 'required',
            'pointtwo'=> 'required',
            'pointthree'=> 'required'  	 	
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/sub_categories', 'public');
            $data['image'] = $iconPath;
        }
        Featured::create($data);
        return redirect()->route('admin.featured_categories.index')->with('message', 'featured categories Updated successfully');
    }











}
