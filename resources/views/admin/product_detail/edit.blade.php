@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('product_detail.update',$productDetail->id)}}" method="post">
    @method('put')
    @csrf
    
    <div class="form-group">
        <label for="exampleInputEmail1">Sản Phẩm</label>
        <select name="product_id" class="custom-select">
            <option value="0">Chọn sản phẩm</option>
            @foreach($products as $product)
                <option {{ $productDetail->product_id == $product->id ? 'selected' : ''}} value="{{$product->id}}">{{$product->name}}</option>
            @endforeach                                                
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Loại sản phẩm</label>
        <input type="text" class="form-control"  value="{{$productDetail->type}}" name="type" id="exampleInputEmail1" aria-describedby="emailHelp"/>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Màu</label>
        <input type="text" class="form-control"  value="{{$productDetail->color}}" name="color" id="exampleInputEmail1" aria-describedby="emailHelp"/>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Dung lượng</label>
        <input type="text" class="form-control"  value="{{$productDetail->capacity}}" name="capacity" id="exampleInputEmail1" aria-describedby="emailHelp"/>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Bộ nhơ trong (Ram)</label>
        <input type="text" class="form-control"  value="{{$productDetail->ram}}" name="ram" id="exampleInputEmail1" aria-describedby="emailHelp"/>
        
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Màn Hình</label>
        <input type="text" class="form-control"  value="{{$productDetail->screen_size}}" name="screen_size" id="exampleInputEmail1" aria-describedby="emailHelp"/>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Số lượng</label>
        <input type="number" class="form-control"  value="{{$productDetail->qty}}" name="qty" id="exampleInputEmail1" aria-describedby="emailHelp"/>
    </div>

    
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
    

    </form>

</div>

@endsection