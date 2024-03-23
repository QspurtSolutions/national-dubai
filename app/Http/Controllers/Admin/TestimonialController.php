<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;



class TestimonialController extends Controller
{
    

    public function index(){
        $testimonial = Testimonial::get();
        return view('admin.testimonial.index', compact('testimonial'));
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonial::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.testimonial.edit', ['id' => $row->id]);
                    $deleteUrl = route('admin.testimonial.destroy', ['id' => $row->id]);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a> 
            <form action="' . $deleteUrl . '" method="POST" class="d-inline">
                ' . csrf_field() . '
                ' . method_field('DELETE') . '
                <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
            </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.testimonial.index');
    }





    public function create()
    {
        return view('admin.testimonial.create', [
            'testimonial' => new Testimonial()
        ]);
    }
	 	

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
           
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/banner', 'public');
            $data['image'] = $iconPath;
        }
        Testimonial::create($data);
        return redirect()->route('admin.testimonial.index')->with('message', 'banner Updated successfully');
        
    }




    public function edit($id)
    {
        $testimonial = Testimonial::findOrfail($id);
        return view('admin.testimonial.create', compact('testimonial'));
    }




    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'content' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
        ]);
        $iconPath = null;
        if ($request->hasFile('image')) {
            $iconPath = $request->file('image')->store('uploads/works', 'public');
            $data['image'] = $iconPath;
        }
        $testimonial =  Testimonial::findOrFail($id);
        $testimonial->update($data);
        return redirect()->route('admin.testimonial.index')->with('message', 'Career Updated successfully');
    }





    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Career deleted successfully');
    }










}
