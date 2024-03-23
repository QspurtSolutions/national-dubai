<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    



    public function index()
    {
        $Categories = Categories::get();
        return view('admin.Categories.index', compact('Categories'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Categories::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function (Categories $row) {
                    $editUrl = route('admin.Categories.edit', ['id' => $row->id]);
                    $deleteUrl = route('admin.Categories.destroy', ['id' => $row->id]);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a> 
                <Categories action="' . $deleteUrl . '" method="POST" class="d-inline" id="work-Categories'.$row->id.'">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" onclick="deleteItem(`'.$row->heading.'`, '.$row->id.');" class="delete btn btn-danger btn-sm">Delete</button>
                </Categories>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create', [
            'categories' => new Categories()
        ]);
    }




    public function store(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/Categories', 'public');
            $data['image'] = $iconPath;
        }
        Categories::create($data);
        return redirect()->route('admin.categories.index')->with('message', 'Categories Updated successfully');
    }





    public function edit($id)
    {
        $categories =  Categories::findOrfail($id);
        return view('admin.categories.create', compact('categories'));
    }




    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'subheading' => 'required',
            'heading' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/works', 'public');
            $data['image'] = $iconPath;
        }
        $data['slug'] = Str::slug($request->heading);
        $categories = Categories::findOrFail($id);
        $categories->update($data);
        return redirect()->route('admin.categories.list')->with('message', 'Updated successfully');
    }



    public function destroy($id)
    {
        Categories::findOrFail($id)->delete();
        return redirect()->route('admin.categories.list')->with('message', 'Entry Deleted successfully');
    }








}
