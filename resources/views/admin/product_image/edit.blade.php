@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('product_image.update' , $productImage->id)}}" method="post">
    @method('put')
    @csrf
    
    <div class="form-group">
        <label for="exampleInputEmail1">Sản Phẩm</label>
        <select name="product_id" class="custom-select">
            <option value="0">Chọn sản phẩm</option>
            @foreach($products as $product)
                <option {{$productImage->product_id == $product->id ? 'selected' : ''}} value="{{$product->id}}">{{$product->name}}</option>
            @endforeach                                                
        </select>
    </div>

    <div class="form-group ">
        <label for="menu">Ảnh sản phẩm</label>
        <input type="file" class="form-control" id="upload">
        <div id="image_show">
            <a href="{{$productImage->path}}">
                <img src="{{$productImage->path}}" alt="{{$productImage->name}}" width="100px">
            </a>
        </div>
        <input type="hidden" value="{{$productImage->path}}" name="path" id="thumb">
    </div>

    
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
    

    </form>

</div>

@endsection