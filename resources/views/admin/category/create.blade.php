@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('category.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" value="{{old('name')}}" name="name" id="title" onkeyup="ChangeToSlug()"  aria-describedby="emailHelp" placeholder="Nhập title..">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Slug</label>
        <input type="text" class="form-control" value="{{old('slug')}}" name="slug" id="slug" aria-describedby="emailHelp" placeholder="Nhập title..">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Danh Muc</label>
        <select name="parent_id" class="custom-select">
            <option value="0">Danh muc cha</option>
            @foreach($categories as $cate)
                @if($cate->parent_id == 0)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endif
            @endforeach                                                
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea type="text" class="form-control"  value="{{old('description')}}" name="description" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
    </div>

    <div class="form-group">
        <label>Active</label>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
            <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
            <label for="no_active" class="custom-control-label">Không</label>
        </div>
    </div>


    
    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    

    </form>

</div>

@endsection