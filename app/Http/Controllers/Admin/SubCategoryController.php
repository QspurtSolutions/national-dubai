<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubCategoryImage;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("text");
        $sub_categories = SubCategory::get();
        return view('admin.sub_categories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sub_categories.create', [
            'sub_categories' => new SubCategory(),
            'categories'  => Categories::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
      
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/sub_categories', 'public');
            $data['image'] = $iconPath;
        }

        $subcategory = SubCategory::create($data);

        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $additionalImagePath = $file->store('uploads/sub_categories', 'public');
                SubCategoryImage::create([
                    'sub_category_id' => $subcategory->id,
                    'image_path' => $additionalImagePath
                ]);
            }
        }
        
        return redirect()->route('admin.sub_categories.index')->with('message', 'sub_categories Updated successfully');
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
        $sub_categories = SubCategory::query();
       
        $sub_categories->latest();
     
        return DataTables::eloquent($sub_categories)
            ->addIndexColumn()
            ->editColumn('category', function (SubCategory $sub_categories) {
              return $sub_categories->category->heading ?? '';

        })
             ->editColumn('status', function (SubCategory $sub_categories) {
                    if($sub_categories->status == 'enable') {
                     return '<div class="badge bg-success float-end bg-status">Enabled</div>';
                    } else {
                        return '<div class="badge bg-danger float-end bg-status">Disabled</div>';
                    }

            })
          
            ->addColumn('action', function (SubCategory $sub_categories) {
                $deleteUrl = route('admin.sub_categories.destroy', ['id' => $sub_categories->id]);
                return '<a title="Edit Company" href="' . route('admin.sub_categories.edit', $sub_categories->id) . '" class="btn btn-info btn-sm"><span class="bx bx-edit"></span></a>
                <form action="' . $deleteUrl . '" method="POST" class="d-inline" id="work-form'.$sub_categories->id.'">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" onclick="deleteItem(`'.$sub_categories->heading.'`, '.$sub_categories->id.');" class="delete btn btn-danger btn-sm">Delete</button>
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
        $sub_categories =  SubCategory::findOrfail($id);
        $categories  = Categories::get();
        return view('admin.sub_categories.create', compact('sub_categories','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/sub_categories', 'public');
            $data['image'] = $iconPath;
        }
       
        $sub_categories = SubCategory::findOrFail($id);
        $sub_categories->update($data);
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $additionalImagePath = $file->store('uploads/sub_categories', 'public');
                SubCategoryImage::create([
                    'sub_category_id' => $sub_categories->id,
                    'image_path' => $additionalImagePath
                ]);
            }
        }
        return redirect()
        ->route('admin.sub_categories.index')
        ->with('message', 'Category updated successfully.!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
        SubCategory::findOrFail($id)->delete();
        return redirect()
        ->route('admin.sub_categories.index')
        ->with('message', 'Category deleted successfully.!');
    }
    public function getAdditionalImages(SubCategory $subcategory)
    {
        
        $images = SubCategoryImage::where('sub_category_id',$subcategory->id)->pluck('image_path')->toArray();
       //dd($images);
        return response()->json(['images' => $images]);
    }
}

