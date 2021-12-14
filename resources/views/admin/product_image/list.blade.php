@extends('admin.main')

@section('content')


<table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($productImages as $key => $productImage)
            

        <tr>
        <td>{{ $productImage->id }}</td>

        <td>{{ $productImage->product->name }}</td>

            <td>
                <a href="{{ $productImage->path }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ $productImage->path }}" alt="{{ $productImage->product->name }}" width="100px">
                </a>
            </td>
            
           
            
            
            <td>{{ $productImage->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('product_image.edit',[ $productImage->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('product_image.destroy',[ $productImage->id] )}}" method="post">
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
