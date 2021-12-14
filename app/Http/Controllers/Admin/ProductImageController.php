<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductImageController extends Controller
{
    
    public function index()
    {
        $productImages = ProductImage::orderby('id' ,'desc')->paginate(10);

        return view('admin.product_image.list',[
            'title' => 'Quản lý ảnh sản phẩm',
            'productImages' => $productImages,
        ]);
    }

    
    public function create()
    {
        $products = Product::orderBy('id','desc')->paginate(10);

        return view('admin.product_image.create',[
            'title' => 'Quản lý ảnh sản phẩm',
            'products' => $products,
        ]);
    }

    
    public function store(Request $request)
    {
        ProductImage::create($request->all());

        Session::flash('success' , 'Thêm Thành công');
        return back();
    }

    
    public function edit($id)
    {
        $productImage = ProductImage::find($id);
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.product_image.edit',[
            'title' => 'Quản lý ảnh sản phẩm',
            'products' => $products,
            'productImage' => $productImage,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $productImage = ProductImage::find($id);
            
        $productImage->product_id =  $request->input('product_id');
        $productImage->path =  $request->input('path');
     
       
        $productImage->save();

        Session::flash('success', 'Cập nhật thành công');

        return redirect('admin/product_image');
    }

    
    public function destroy($id)
    {
        ProductImage::find($id)->delete();
        Session::flash('success', 'Xóa thành công');
        
        return back();
    }
}
