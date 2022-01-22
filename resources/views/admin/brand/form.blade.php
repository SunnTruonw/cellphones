@extends('admin.main')

@section('content')



                <div class="card-body">
                    @if(!isset($brand))
                         <form action="{{route('brand.store')}}" method="post">
                    @else
                        <form action="{{route('brand.update',[$brand->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                    @endif
                    
                         @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" value="{{isset($brand) ? $brand->name : ''}}" class="form-control" value="{{old('name')}}" name="name" id="title" onkeyup="ChangeToSlug()" aria-describedby="emailHelp" placeholder="Nhập dữ liệu..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">SLug</label>
                            <input type="text" value="{{isset($brand) ? $brand->slug : ''}}" class="form-control" value="{{old('slug')}}" name="slug" id="slug" aria-describedby="emailHelp" placeholder="Nhập dữ liệu..">
                        </div>

                        
                        @if(!isset($brand))
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        @else
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        @endif
                       
                    </form>

                </div>

                <div class="card-header">Liệt kê thương hiệu</div>

                <table class="table">
                    <thead >
                        <tr >
                        
                                <th >ID</th>
                                <th>Tên thương hiệu</th>
                                <th>Slug</th>
                                <th>Cập Nhật</th>
                               
                                <th style="width: 100px">&nbsp;</th>
                        
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($list as $key => $brand)
                            

                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            
                            
                            <td>{{ $brand->updated_at }}</td>

                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('brand.edit',[ $brand->id] )}}">
                                    Edit
                                </a>
                                
                                <form action="{{ route('brand.destroy',[ $brand->id] )}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button  class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa brand này không ?');">
                                        Delete
                                    </button>
                                </form>
                                
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>



@endsection