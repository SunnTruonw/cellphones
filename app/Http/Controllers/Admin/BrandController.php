<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    
    public function create()
    {
        $list = Brand::all();

        return view('admin.brand.form',[
            'title' => 'Thương hiệu',
            'list' => $list,
        ]);
    }

    
    public function store(Request $request)
    {
        Brand::create($request->all());

        session()->flash('success', 'Thêm thành công');

        return back();
    }

   
    public function edit($id)
    {
        $brand = Brand::find($id);
        $list = Brand::all();

        return view('admin.brand.form',[
            'title' => 'Thương hiệu',
            'list' => $list,
            'brand' => $brand,
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
            
        $brand->name =  $request->input('name');
        $brand->slug =  $request->input('slug');
        
        $brand->save();

        session()->flash('success', 'Cập nhật thành công');

        return back();
    }

    
    public function destroy($id)
    {
        Brand::find($id)->delete();

       session()->flash('success', 'Xóa thành công');

       return back();
    }
}
