@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('store.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">City</label>
        <input type="text" class="form-control" value="{{old('city')}}" name="city" id="title" onkeyup="ChangeToSlug()"  aria-describedby="emailHelp" placeholder="Nhập title..">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Slug</label>
        <input type="text" class="form-control" value="{{old('slug')}}" name="slug" id="slug" aria-describedby="emailHelp" placeholder="Nhập title..">
    </div>

    
    <button type="submit" class="btn btn-primary">Thêm</button>
    

    </form>

</div>

@endsection