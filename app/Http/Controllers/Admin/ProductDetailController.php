<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductDetailController extends Controller
{

    public function index()
    {
        $productDetails = ProductDetail::orderby('id', 'desc')->paginate(10);

        return view('admin.product_detail.list', [
            'title' => 'Quản lý chi tiết sản phẩm',
            'productDetails' => $productDetails,
        ]);
    }


    public function create()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.product_detail.create', [
            'title' => 'Quản lý chi tiết sản phẩm',
            'products' => $products,
        ]);
    }


    public function store(Request $request)
    {
        if ($request->color) {
            $colors = $request->color;
            foreach ($colors as $color) {
                try {

                    ProductDetail::create([
                        'product_id' => $request->input('product_id'),
                        'qty' => $request->input('qty'),
                        'type' => $request->input('type'),
                        'ram' => $request->input('ram'),
                        'screen_size' => $request->input('screen_size'),
                        'capacity' => $request->input('capacity'),
                        'color' => $color,
                    ]);
                } catch (Exception $exception) {
                    dd($exception->getMessage());
                }
            }
        }


        Session::flash('success', 'Thêm Thành công');
        return back();
    }


    public function edit($id)
    {

        $productDetail = ProductDetail::find($id);

        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.product_detail.edit', [
            'title' => 'Quản lý chi tiết sản phẩm',
            'products' => $products,
            'productDetail' => $productDetail,
        ]);
    }


    public function update(Request $request, $id)
    {
        $productDetail = ProductDetail::find($id);

        $productDetail->product_id =  $request->input('product_id');
        $productDetail->type =  $request->input('type');
        $productDetail->ram =  $request->input('ram');
        $productDetail->screen_size =  $request->input('screen_size');
        $productDetail->color =  $request->input('color');
        $productDetail->capacity =  $request->input('capacity');
        $productDetail->qty =  $request->input('qty');

        $productDetail->save();

        Session::flash('success', 'Cập nhật thành công');

        return redirect('admin/product_detail');
    }


    public function destroy($id)
    {
        ProductDetail::find($id)->delete();
        Session::flash('success', 'Xóa thành công');

        return back();
    }
}
