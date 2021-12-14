@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('slider.update', $slider->id)}}" method="post">
    @method('put')
    @csrf
    
    <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" value="{{$slider->title}}" name="title"  aria-describedby="emailHelp" placeholder="Nhập mã..">
    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">Mô tả</label>
        <textarea type="text" class="form-control"  value="{{old('description')}}" name="description" id="exampleInputEmail1" aria-describedby="emailHelp">{{$slider->description}}</textarea>
    </div>

    <div class="form-group ">
        <label for="menu">Hình Ảnh</label>
        <input type="file" class="form-control" id="upload">
        <div id="image_show">
            <a href="{{ $slider->image }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ $slider->image }}" alt="{{ $slider->title }}" width="100px">
            </a>
        </div>
        <input type="hidden" name="image" id="thumb">
    </div>

    
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
    

    </form>

</div>

@endsection