@extends('admin.main')

@section('content')


<div class="card-body">
    <form action="{{route('store_detail.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Số điện thoại</label>
        <input type="text" class="form-control" value="{{old('phone')}}" name="phone"   aria-describedby="emailHelp" placeholder="Nhập title..">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Thành phố</label>
        <select name="store_id" class="custom-select">
            @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->city}}</option>
            @endforeach                                                
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Địa chỉ</label>
        <input type="text" class="form-control" value="{{old('address')}}" name="address"  aria-describedby="emailHelp" placeholder="Nhập title..">
    </div>

    
    <button type="submit" class="btn btn-primary">Thêm</button>
    

    </form>

</div>

@endsection