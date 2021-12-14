@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('slider.store')}}" method="post">
    @csrf
    
    <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" value="{{old('title')}}" name="title"  aria-describedby="emailHelp" placeholder="Nhập mã..">
    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">Mô tả</label>
        <textarea type="text" class="form-control"  value="{{old('description')}}" name="description" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
    </div>

    <div class="form-group ">
        <label for="menu">Hình Ảnh</label>
        <input type="file" class="form-control" id="upload">
        <div id="image_show">
            
        </div>
        <input type="hidden" name="image" id="thumb">
    </div>

    
    <button type="submit" class="btn btn-primary">Thêm</button>
    

    </form>

</div>

@endsection