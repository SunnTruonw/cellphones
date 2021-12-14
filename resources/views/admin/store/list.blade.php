@extends('admin.main')

@section('content')


<table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Thành phố</th>
                <th>Slug</th>
                
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($stores as $key => $store)
            

        <tr>
            <td>{{ $store->id }}</td>
            <td>{{ $store->city }}</td>
            <td>{{ $store->slug }}</td>
           
            
            
            <td>{{ $store->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('store.edit',[ $store->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('store.destroy',[ $store->id] )}}" method="post">
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
