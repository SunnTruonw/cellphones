@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('store.update', $store->id)}}" method="post">
        @method('put')
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">City</label>
        <input type="text" class="form-control" value="{{$store->city}}" name="city" id="title" onkeyup="ChangeToSlug()"  aria-describedby="emailHelp" placeholder="Nhập title..">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Slug</label>
        <input type="text" class="form-control" value="{{$store->slug}}" name="slug" id="slug" aria-describedby="emailHelp" placeholder="Nhập title..">
    </div>

    
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
    

    </form>

</div>

@endsection