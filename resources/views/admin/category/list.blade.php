@extends('admin.main')

@section('content')




<table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Tên</th>
                <th>Danh mục</th>
                 <th>Cập Nhật</th>
             
               
                 <th>Hiển thị</th>
                  <th>Mô tả</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
         {!! App\Helpers\Helper::category($categories) !!}
    </tbody>
</table>




</div>
@endsection