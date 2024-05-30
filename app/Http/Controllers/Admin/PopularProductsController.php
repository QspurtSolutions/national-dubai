<?php

namespace App\Http\Controllers\Admin;
use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\PopularProducts;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PopularProductsController extends Controller
{
    public function index()
    {
        //dd("text");
        $popular_products = PopularProducts::get();
        return view('admin.popular_products.index', compact('popular_products'));
    }



    public function create()
    {
        return view('admin.popular_products.create', [
            'popular_products' => new PopularProducts(),
            'categories'  => Categories::get(),
            'sub_categories'  => SubCategory::get()
        ]);
    }



    public function store(Request $request)
    {
      // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
      
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/popular_productss', 'public');
            $data['image'] = $iconPath;
        }
        PopularProducts::create($data);
        return redirect()->route('admin.popular_products.index')->with('message', 'popular_productss Updated successfully');
    }



    public function show(string $id)
    {
        //
    }
    public function table(Request $request)
    {
        $popular_productss = PopularProducts::query();
       
        $popular_productss->latest();
     
        return DataTables::eloquent($popular_productss)
            ->addIndexColumn()
            ->editColumn('category', function (PopularProducts $popular_productss) {
              return $popular_productss->category->heading ?? '';

        })
             ->editColumn('status', function (PopularProducts $popular_productss) {
                    if($popular_productss->status == 'enable') {
                     return '<div class="badge bg-success float-end bg-status">Enabled</div>';
                    } else {
                        return '<div class="badge bg-danger float-end bg-status">Disabled</div>';
                    }

            })
          
            ->addColumn('action', function (PopularProducts $popular_productss) {
                $deleteUrl = route('admin.popular_productss.destroy', ['id' => $popular_productss->id]);
                return '<a title="Edit Company" href="' . route('admin.popular_productss.edit', $popular_productss->id) . '" class="btn btn-info btn-sm"><span class="bx bx-edit"></span></a>
                <form action="' . $deleteUrl . '" method="POST" class="d-inline" id="work-form'.$popular_productss->id.'">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" onclick="deleteItem(`'.$popular_productss->heading.'`, '.$popular_productss->id.');" class="delete btn btn-danger btn-sm">Delete</button>
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
        $popular_productss =  PopularProducts::findOrfail($id);
        $categories  = Categories::get();
        return view('admin.popular_productss.create', compact('popular_productss','categories'));
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
            'subcategory_id' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/popular_productss', 'public');
            $data['image'] = $iconPath;
        }
       
        $popular_productss = PopularProducts::findOrFail($id);
        $popular_productss->update($data);
       
        return redirect()
        ->route('admin.popular_productss.index')
        ->with('message', 'Category updated successfully.!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
        PopularProducts::findOrFail($id)->delete();
        return redirect()
        ->route('admin.popular_productss.index')
        ->with('message', 'Category deleted successfully.!');
    }






}
