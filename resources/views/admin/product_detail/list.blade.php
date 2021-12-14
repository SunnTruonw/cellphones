@extends('admin.main')

@section('content')


<table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Sản phẩm</th>
                <th>Loại Sản phẩm</th>
                <th>Màu sắc</th>
                <th>Ram</th>
                <th>Dung lượng</th>
                <th>Màn hình</th>
                <th>Số lượng</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($productDetails as $key => $productDetail)
            

        <tr>
        <td>{{ $productDetail->id }}</td>

            <td>{{ $productDetail->product->name }}</td>
            <td>{{ $productDetail->type }}</td>
            <td>{{ $productDetail->color }}</td>
            <td>{{ $productDetail->ram }}</td>
            <td>{{ $productDetail->screen_size }}</td>
            <td>{{ $productDetail->capacity }}</td>
            <td>{{ $productDetail->qty }}</td>
           
            
            
            <td>{{ $productDetail->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('product_detail.edit',[ $productDetail->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('product_detail.destroy',[ $productDetail->id] )}}" method="post">
                    @method('delete')
                    @csrf
                    <button  class="btn btn-danger btn-sm"
                    onclick="return confirm('Bạn có chắc muốn xóa không ?');">
                        Delete
                    </button>
                </form>
                
            </td>
        </tr>

        @endforeach
    </tbody>
</table>


@endsection
