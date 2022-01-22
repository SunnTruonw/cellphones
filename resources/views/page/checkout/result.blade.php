@extends('layouts')


@section('content') 

<div class="module no-item" style="text-align: center; margin-top: 50px;">
    <i style="font-size:30px; margin-bottom:30px;" class="fal fa-sms"></i>
    <p style="font-size: 22px; font-weight: 300;margin-bottom:30px;">{{$notification}}</p>
    <div style="font-size: 22px; font-weight: 300;margin-bottom:30px;text-align :center;"><p>Cảm ơn bạn đã tin tưởng và lựa chọn Cellphones</p></div>
    <a href="/" class="btn btn-default btn-sm" style="margin-top: 30px;color:red;">Quay về trang chủ</a>
</div>

@endsection