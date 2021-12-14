<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    
    public function index()
    {
        $stores = Store::orderBy('id' ,'asc')->get();

        return view('admin.store.list',[
            'title' => 'Liệt kê danh mục',
            'stores' => $stores,
        ]);
    }

   
    public function create()
    {
        return view('admin.store.create',[
            'title' => 'Quản lý cửa hàng',
        ]);
    }

    
    public function store(Request $request)
    {
        Store::create($request->all());

        Session::flash('success' , 'Thêm thành công');
        return back();
    }

    
    public function edit($id)
    {
        $store = Store::find($id);

        return view('admin.store.edit', [
            'title' => 'Cập nhật địa chỉ cửa hàng : ' . $store->city,
            'store' => $store,
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $store = Store::find($id);
            
        $store->city =  $request->input('city');
        $store->slug =  $request->input('slug');

        $store->save();

        Session::flash('success', 'Cập nhật  thành công');

        return redirect('admin/store');
    }

    
    public function destroy($id)
    {
        Store::find($id)->delete();

        Session::flash('success', 'Xóa thành công');

        return back();
    }
}
