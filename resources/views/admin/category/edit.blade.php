@extends('admin.main')

@section('content')


                <div class="card-body">
                    <form action="{{route('category.update',[$category->id])}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" value="{{$category->name}}" name="name" onkeyup="ChangeToSlug()" id="title" aria-describedby="emailHelp" placeholder="Nhập title..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" value="{{$category->slug}}" name="slug" id="slug"  aria-describedby="emailHelp" placeholder="Nhập category..">
                        </div>

                        <div class="form-group">
                            <label>Danh Mục</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0" {{ $category->parent_id == 0 ? 'selected' : '' }}>Danh Mục Cha</option>
                                    @foreach($categories as  $cate)
                                        @if($cate->parent_id == 0)
                                            <option value="{{$cate->id}}"
                                            {{ $category->parent_id == $cate->id ? 'selected' :'' }}>{{$cate->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label >Mô tả</label>
                            <textarea name="description"  class="form-control" id="" >{{$category->description}}</textarea>
                        </div>

                      
                      

                        
                        <div class="form-group">
                        <label>Kích Hoạt</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{$category->active == 1 ? 'checked' : ''}}> 
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{$category->active == 0 ? 'checked' : ''}}>
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                    </div>

                        

                        

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
  
@endsection