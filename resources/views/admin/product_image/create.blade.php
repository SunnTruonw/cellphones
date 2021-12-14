@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('product_image.store')}}" method="post">
    @csrf
    
    <div class="form-group">
        <label for="exampleInputEmail1">Sản Phẩm</label>
        <select name="product_id" class="custom-select">
            <option value="0">Chọn sản phẩm</option>
            @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach                                                
        </select>
    </div>

    <div class="form-group ">
        <label for="menu">Ảnh sản phẩm</label>
        <input type="file" class="form-control" id="upload">
        <div id="image_show">
            
        </div>
        <input type="hidden" name="path" id="thumb">
    </div>

    
    <button type="submit" class="btn btn-primary">Thêm</button>
    

    </form>

</div>

@endsection