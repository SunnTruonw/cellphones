@extends('admin.main')

@section('content')


<table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($sliders as $key => $slider)
            

        <tr>
            <td>{{ $slider->id }}</td>

            <td>{{ $slider->title }}</td>
            <td>{{ $slider->description }}</td>

            <td>
                <a href="{{ $slider->image }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ $slider->image }}" alt="{{ $slider->title }}" width="100px">
                </a>
            </td>
            
           
            
            
            <td>{{ $slider->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('slider.edit',[ $slider->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('slider.destroy',[ $slider->id] )}}" method="post">
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
