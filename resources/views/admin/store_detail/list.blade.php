@extends('admin.main')

@section('content')


<table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Thành phố</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($storeDetails as $key => $storeDetail)
            

        <tr>
        <td>{{ $storeDetail->id }}</td>

            <td>{{ $storeDetail->store->city }}</td>
            <td>{{ $storeDetail->phone }}</td>
            <td>{{ $storeDetail->address }}</td>
           
            
            
            <td>{{ $storeDetail->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('store_detail.edit',[ $storeDetail->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('store_detail.destroy',[ $storeDetail->id] )}}" method="post">
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
