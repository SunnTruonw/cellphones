<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Brand;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.product.list',[
            'title' => 'Quản lý sản phẩm',
            'products' => $products,
            
        ]);
    }

    
    public function create()
    {
        $categories = Category::orderBy('id' ,'asc')->get();
        $brands = Brand::orderBy('id' ,'asc')->get();
        $stores = Store::orderBy('id' ,'asc')->get();
        

        return view('admin.product.create',[
            'title' => 'Thêm sản phẩm',
            'categories' => $categories,
            'brands' => $brands,
            'stores' => $stores,
        ]);
    }

    
    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        Session::flash('success', 'Thêm sản phẩm thành công');

        return back();
    }

    
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('id' ,'asc')->get();
        $brands = Brand::orderBy('id' ,'asc')->get();
        $stores = Store::orderBy('id' ,'asc')->get();
        

        return view('admin.product.edit',[
            'title' => 'Quản lý sản phẩm',
            'categories' => $categories,
            'stores' => $stores,
            'brands' => $brands,
            'product' => $product,
        ]);
    }

    
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
            
        $product->name =  $request->input('name');
        $product->slug =  $request->input('slug');
        $product->brand_id =  $request->input('brand_id');
        $product->category_id =  $request->input('category_id');
        $product->store_id =  $request->input('store_id');
        $product->content =  $request->input('content');
        $product->review_content =  $request->input('review_content');
        $product->price =  $request->input('price');
        $product->discount =  $request->input('discount');
        $product->qty =  $request->input('qty');
        $product->active =  $request->input('active');
        $product->sku =  $request->input('sku');
        $product->image =  $request->input('image');
        $product->tag =  $request->input('tag');
        $product->description =  $request->input('description');
        
        $product->active =  $request->input('active');

        $product->save();

        Session::flash('success', 'Cập nhật thành công');

        return redirect('admin/product');
    }

    
    public function destroy($id)
    {
        Product::find($id)->delete();
        Session::flash('success', 'Xóa thành công');
        
        return back();
    }
}
