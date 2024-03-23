<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;



class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::get();
        return view('admin.brand.index', compact('brand'));
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function (Brand $row) {
                    $editUrl = route('admin.banner.edit', ['id' => $row->id]);
                    $deleteUrl = route('admin.banner.destroy', ['id' => $row->id]);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a> 
                <Banner action="' . $deleteUrl . '" method="POST" class="d-inline" id="work-Banner'.$row->id.'">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" onclick="deleteItem(`'.$row->heading.'`, '.$row->id.');" class="delete btn btn-danger btn-sm">Delete</button>
                </Banner>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.brand.index');
    }

    public function create()
    {
        return view('admin.Brand.create', [
            'brand' => new Brand()
        ]);
    }




    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/banner', 'public');
            $data['image'] = $iconPath;
        }
        Brand::create($data);
        return redirect()->route('admin.brand.index')->with('message', 'banner Updated successfully');
    }





    public function edit($id)
    {
        $brand =  Brand::findOrfail($id);
        return view('admin.brand.create', compact('brand'));
    }




    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/works', 'public');
            $data['image'] = $iconPath;
        }
        $data['slug'] = Str::slug($request->heading);
        $brand = Brand::findOrFail($id);
        $brand->update($data);
        return redirect()->route('admin.brand.list')->with('message', 'Updated successfully');
    }



    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        return redirect()->route('admin.brand.list')->with('message', 'Entry Deleted successfully');
    }






}
