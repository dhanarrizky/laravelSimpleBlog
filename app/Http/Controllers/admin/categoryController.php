<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class categoryController extends Controller
{
   
    public function index()
    {
        // return view('admin.category',['categories'=> Category::get()]);
        return view('admin.category.category',['categories'=>Category::orderBy('id','DESC')->get()]);
    }

    
    public function store(Request $request)
    {
        // dd('for test');

        $data = $request->validate([
            'name'=>'required|min:3', // name should have a value and min have 3 character
        ]);

        // untuk convert slug dengan fungsi str
        $data['slug'] = Str::slug($data['name']);

        Category::create($data);
        return back()->with('success','Categories has been created !!');
    }

    
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'=>'required|min:3', // name should have a value and min have 3 character
        ]);

        // untuk convert slug dengan fungsi str
        $data['slug'] = Str::slug($data['name']);

        Category::find($id)->update($data);
        return back()->with('success','Categories has been updated !!');
    }

    
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return back()->with('success','Categories has been deleted !!!');
    }
}
