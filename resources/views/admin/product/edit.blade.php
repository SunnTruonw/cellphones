@extends('admin.main')

@section('content')



                <div class="card-body">
                    <form action="{{route('product.update', $product->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" value="{{$product->name}}" name="name" id="title" onkeyup="ChangeToSlug()" aria-describedby="emailHelp" placeholder="Nhập tên..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Đường dẫn</label>
                            <input type="text" class="form-control" value="{{$product->slug}}" name="slug" id="slug"  aria-describedby="emailHelp" placeholder="Nhập tên..">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="menu">Giá Gốc</label>
                                    <input name="price" value="{{$product->price}}" type="text" class="form-control">
                                </div>                      
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="menu">Giá Giảm</label>
                                    <input name="discount" value="{{$product->discount}}" type="text" class="form-control">
                                </div>                      
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cửa hàng gần nhất</label>
                                    <select name="store_id" class="custom-select">
                                            @foreach($stores as $key => $store)
                                                <option {{$product->store_id == $store->id ? 'selected' : ''}} value="{{$store->id}}">{{$store->city}}</option>
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
                                                    <option {{$product->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                     
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                            <select name="brand_id" class="custom-select">
                                    @foreach($brands as $key => $brand)
                                        @if($brand->parent_id == 0)
                                            <option {{$product->brand_id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div> 

                        <div class="form-group ">
                            <label for="menu">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="upload">
                            <div id="image_show">
                                <a href="{{ $product->image }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" width="100px">
                                </a>
                            </div>
                            <input type="hidden" value="{{ $product->image }}" name="image" id="thumb">
                        </div>
                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="text" class="form-control" value="{{ $product->qty }}" name="qty"  aria-describedby="emailHelp" placeholder="Nhập số lượng..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã sản phẩm</label>
                            <input type="text" class="form-control" value="{{ $product->sku }}" name="sku"  aria-describedby="emailHelp" placeholder="Nhập mã..">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <textarea type="text" class="form-control"  value="{{old('description')}}" name="description" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $product->description }}</textarea>
                        </div>

                        

                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea type="text" class="form-control" rows="8" cols="8" value="{{old('content')}}" name="content" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $product->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Đánh giá</label>
                            <textarea type="text" class="form-control" rows="8" cols="8"  value="{{old('review_content')}}" name="review_content" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $product->review_content }}</textarea>
                        </div>

                        

                        <div class="form-group">
                            <label for="exampleInputEmail1"> Sản phẩn nổi bật</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $product->active == 1 ? 'checked' : '' }}>
                                <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{ $product->active == 0 ? 'checked' : '' }}>
                                <label for="no_active" class="custom-control-label">Không</label>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nhãn</label>
                            <input type="text" class="form-control" value="{{$product->tag}}" name="tag"   aria-describedby="emailHelp" placeholder="Nhập tên..">
                        </div>
                        

                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>

                </div>

@endsection