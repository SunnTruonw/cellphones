@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('product_image.store')}}" method="post" enctype="multipart/form-data">
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

    <style>
        .preview-images {
            display: flex;
            justify-content: flex-start;
            gap: 5px
        }
        .preview-images img {
            width: 150px;
            height: 100px;
        }
    </style>
    <div class="preview-images">

    </div>
    <div class="form-group">
        <label for="exampleInputFile">Hình ảnh</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="path[]" multiple class="images-input custom-file-input"
                       id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
            </div>
        </div>
    </div>

    
    <button type="submit" class="btn btn-primary">Thêm</button>
    

    </form>

</div>

@endsection