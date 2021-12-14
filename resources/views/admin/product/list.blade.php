@extends('admin.main')

@section('content')



<table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Tên sản phẩm</th>
                <th>Đường dẫn</th>
                <th>Giá gốc</th>
                <th>Giá Giảm</th>
                <th>Cửa Hàng</th>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Mã Sản phẩm</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Nổi bật</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($products as $key => $product)
            

        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount }}</td>
            @if(isset($product->store->city))
                <td>{{ $product->store->city }}</td>
            @else
                <td>Đang cập nhật...</td>
            @endif
            @if(isset($product->category->name))
                <td>{{ $product->category->name }}</td>
            @else
                <td>Đang cập nhật...</td>
            @endif
            <td>{{ $product->qty }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{ $product->image }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" width="100px">
                </a>
            </td>
            <td>{!! $product->active == 1 ? '<span class="btn btn-success btn-sm">True</span>' 
                : '<span class="btn btn-danger btn-sm">No</span>' !!}</td>
            
            
            
            <td>{{ $product->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('product.edit',[ $product->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('product.destroy',[ $product->id] )}}" method="post">
                    @method('delete')
                    @csrf
                    <button  class="btn btn-danger btn-sm"
                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không ?');">
                        Delete
                    </button>
                </form>
                
            </td>
        </tr>

        @endforeach
    </tbody>
</table>


<div class="card-footer clearfix">
        {!! $products->links() !!}                              
</div>

@endsection
