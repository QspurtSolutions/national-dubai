<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FeaturedProduct;
use App\Models\SubCategoryImage;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FeaturedProductController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("text");
        $featured_products = FeaturedProduct::get();
        return view('admin.featured_products.index', compact('featured_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.featured_products.create', [
            'featured_products' => new FeaturedProduct(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);
      
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/featured_products', 'public');
            $data['image'] = $iconPath;
        }

        $subcategory = FeaturedProduct::create($data);
        
        return redirect()->route('admin.featured_products.index')->with('message', 'featured_products Updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function table(Request $request)
    {
        $featured_products = FeaturedProduct::query();
       
        $featured_products->latest();
     
        return DataTables::eloquent($featured_products)
            ->addIndexColumn()
          
             ->editColumn('status', function (FeaturedProduct $featured_products) {
                    if($featured_products->status == 'enable') {
                     return '<div class="badge bg-success float-end bg-status">Enabled</div>';
                    } else {
                        return '<div class="badge bg-danger float-end bg-status">Disabled</div>';
                    }

            })
          
            ->addColumn('action', function (FeaturedProduct $featured_products) {
                $deleteUrl = route('admin.featured_products.destroy', ['id' => $featured_products->id]);
                return '<a title="Edit Company" href="' . route('admin.featured_products.edit', $featured_products->id) . '" class="btn btn-info btn-sm"><span class="bx bx-edit"></span></a>
                <form action="' . $deleteUrl . '" method="POST" class="d-inline" id="work-form'.$featured_products->id.'">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" onclick="deleteItem(`'.$featured_products->heading.'`, '.$featured_products->id.');" class="delete btn btn-danger btn-sm">Delete</button>
                </form>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $featured_products =  FeaturedProduct::findOrfail($id);
        $categories  = Categories::get();
        return view('admin.featured_products.create', compact('featured_products','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/featured_products', 'public');
            $data['image'] = $iconPath;
        }
       
        $featured_products = FeaturedProduct::findOrFail($id);
        $featured_products->update($data);
       
        return redirect()
        ->route('admin.featured_products.index')
        ->with('message', 'Category updated successfully.!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
        FeaturedProduct::findOrFail($id)->delete();
        return redirect()
        ->route('admin.featured_products.index')
        ->with('message', 'Category deleted successfully.!');
    }
}

