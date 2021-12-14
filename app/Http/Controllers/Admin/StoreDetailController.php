<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreDetail;
use App\Models\Store;
use Illuminate\Support\Facades\Session;

class StoreDetailController extends Controller
{
    public function index()
    {
        $storeDetails = StoreDetail::orderBy('id' ,'asc')->get();

        return view('admin.store_detail.list',[
            'title' => 'Liệt kê danh mục',
            'storeDetails' => $storeDetails,
        ]);
    }

   
    public function create()
    {
        $stores = Store::orderBy('id' ,'asc')->get();

        return view('admin.store_detail.create',[
            'title' => 'Quản lý cửa hàng',
            'stores' => $stores,
        ]);
    }

    
    public function store(Request $request)
    {
        StoreDetail::create($request->all());

        Session::flash('success' , 'Thêm thành công');
        return back();
    }

    
    public function edit($id)
    {
        $storeDetail = StoreDetail::find($id);
        $stores = Store::orderBy('id' ,'asc')->get();

        return view('admin.store_detail.edit', [
            'title' => 'Cập nhật địa chỉ cửa hàng : ' . $storeDetail->city,
            'storeDetail' => $storeDetail,
            'stores' => $stores,
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $storeDetail = StoreDetail::find($id);
        
            
        $storeDetail->phone =  $request->input('phone');
        $storeDetail->store_id =  $request->input('store_id');
        $storeDetail->address =  $request->input('address');

        $storeDetail->save();

        Session::flash('success', 'Cập nhật  thành công');

        return redirect('admin/store_detail');
    }

    
    public function destroy($id)
    {
        StoreDetail::find($id)->delete();

        Session::flash('success', 'Xóa thành công');

        return back();
    }
}
