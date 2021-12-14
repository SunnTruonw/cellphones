<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::orderBy('id' , 'desc')->get();

        return view('admin.slider.list',[
            'title' => 'Quanr lý SLider',
            'sliders' => $sliders,
        ]);
    }

    
    public function create()
    {
        return view('admin.slider.create',[
            'title' => 'Quanr lý SLider',
        ]);
    }

    
    public function store(Request $request)
    {
        Slider::create($request->all());

        Session::flash('success', 'Thêm thành công ');

        return back();
    }

    
    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('admin.slider.edit',[
            'title' => 'Quản lý SLider',
            'slider' => $slider,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
            
        $slider->title =  $request->input('title');
        $slider->description =  $request->input('description');
        $slider->image =  $request->input('image');
     
       
        $slider->save();

        Session::flash('success', 'Cập nhật thành công');

        return redirect('admin/product_image');
    }

    
    public function destroy($id)
    {
        Slider::find($id)->delete();

        Session::flash('success', 'Xóa thành công ');

        return back();
    }
}
