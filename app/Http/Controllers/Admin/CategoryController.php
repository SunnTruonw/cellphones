<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id' ,'asc')->get();

        return view('admin.category.list',[
            'title' => 'Liệt kê danh mục',
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id' ,'asc')->get();

        return view('admin.category.create',[
            'title' => 'Quản lý danh mục',
            'categories' => $categories,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->all());

        Session::flash('success', 'Thêm danh mục thành công');

        return back();
    }

    
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::orderBy('id' ,'desc')->get();


        return view('admin.category.edit', [
            'title' => 'Cập Nhật category : ' . $category->name,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
            
        $category->name =  $request->input('name');
        $category->slug =  $request->input('slug');
        $category->parent_id =  $request->input('parent_id');
        $category->description =  $request->input('description');
        
        $category->active =  $request->input('active');

        $category->save();

        Session::flash('success', 'Cập nhật  thành công');

        return redirect('admin/category');
    }

    
    public function destroy(Request $request, $id)
    {
        $id = $request->input('id');
        $category = Category::where('id', $id)->first();

        $category->delete();
 
        return response()->json([
            'error' => false,
            'message' => 'Xóa thành công danh mục'
        ]);
    }
}
