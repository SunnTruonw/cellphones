@extends('admin.main')

@section('content')



                <div class="card-body">
                    <form action="{{route('product.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" value="{{old('name')}}" name="name" id="title" onkeyup="ChangeToSlug()" aria-describedby="emailHelp" placeholder="Nhập tên..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Đường dẫn</label>
                            <input type="text" class="form-control" value="{{old('slug')}}" name="slug" id="slug"  aria-describedby="emailHelp" placeholder="Nhập tên..">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="menu">Giá Gốc</label>
                                    <input name="price" type="text" class="form-control">
                                </div>                      
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="menu">Giá Giảm</label>
                                    <input name="discount" type="text" class="form-control">
                                </div>                      
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cửa hàng gần nhất</label>
                                    <select name="store_id" class="custom-select">
                                            @foreach($stores as $key => $store)
                                                <option value="{{$store->id}}">{{$store->city}}</option>
                                            @endforeach
                                    </select>
                                </div>                      
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                    <select name="category_id" class="custom-select">
                                            @foreach($categories as $key => $category)
                                                @if($category->parent_id == 0)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                     
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="menu">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="upload">
                            <div id="image_show">
                                
                            </div>
                            <input type="hidden" name="image" id="thumb">
                        </div>
                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="text" class="form-control" value="{{old('qty')}}" name="qty"  aria-describedby="emailHelp" placeholder="Nhập số lượng..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã sản phẩm</label>
                            <input type="text" class="form-control" value="{{old('sku')}}" name="sku"  aria-describedby="emailHelp" placeholder="Nhập mã..">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <textarea type="text" class="form-control"  value="{{old('description')}}" name="description" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                        </div>

                        

                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea type="text" class="form-control"  value="{{old('content')}}" name="content" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                        </div>

                        

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Sản phẩn nổi bật</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                                <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                                <label for="no_active" class="custom-control-label">Không</label>
                            </div>
                        </div>
                      

                        

                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                    </form>

                </div>

@endsection