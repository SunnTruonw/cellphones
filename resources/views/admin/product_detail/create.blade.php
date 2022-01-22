@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('product_detail.store')}}" method="post">
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

    <div class="form-group">
        <label for="exampleInputEmail1">Loại sản phẩm</label>
        <input type="text" class="form-control"  value="{{old('type')}}" name="type" id="exampleInputEmail1" aria-describedby="emailHelp"/>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Màu</label>
        <div>
            <input type="checkbox" name="color[Bạc]" value="Bạc"/>
            <span>
                 Bạc
            </span>
        </div>
        <div>
            <input type="checkbox" name="color[Vàng]" value="Vàng"/>
            <span>
                 Vàng
            </span>
        </div>
        <div>
            <input type="checkbox" name="color[Xanh]" value="Xanh"/>
            <span>
                 Xanh
            </span>
        </div>
        <div>
            <input type="checkbox" name="color[Xám]" value="Xám"/>
            <span>
                 Xám
            </span>
        </div>
        <div>
            <input type="checkbox" name="color[Đen]" value="Đen"/>
            <span>
                 Đen
            </span>
        </div>
        
    </div>

    

    <div class="form-group">
        <label for="exampleInputEmail1">Bộ nhơ trong (Ram)</label>
        
        <select name="ram" class="custom-select">
            <option value="0">Chọn dung lượng</option>
            <option value="4GB">4GB</option>
            <option value="8GB">8GB</option>
            <option value="16GB">16GB</option>

            <option value="32GB">32GB</option>
                                           
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Dung lượng</label>
        <select name="capacity" class="custom-select">
            <option value="0">Chọn dung lượng</option>
            <option value="32GB">32GB</option>
            <option value="64GB">64GB</option>
            <option value="128GB">128GB</option>

            <option value="128GB">128GB</option>
            <option value="256GB">256GB</option>
            <option value="512GB">512GB</option>
            <option value="1TB">1TB</option>                                           
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Màn Hình</label>
        <input type="text" class="form-control"  value="{{old('screen_size')}}" name="screen_size" id="exampleInputEmail1" aria-describedby="emailHelp"/>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Số lượng</label>
        <input type="text" class="form-control"  value="{{old('qty')}}" name="qty" id="exampleInputEmail1" aria-describedby="emailHelp"/>
    </div>

    
    <button type="submit" class="btn btn-primary">Thêm</button>
    

    </form>

</div>

@endsection

