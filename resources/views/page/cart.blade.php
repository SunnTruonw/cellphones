@extends('layouts')


@section('content') 


<div class="block-link-cat">
    <div class="container">
        <ul class="list-link-item">
            <li>
                <a href="/"><i class="fas fa-home"></i>Trang chủ </a>
                <i class="fas fa-chevron-right"></i>
            </li>
            <li>
                <a href="/cart">Giỏ hàng</a>
            </li>
        </ul>
        <div class="cboth"></div>
    </div>
</div>
<style>
    .cart-destroy:hover {
    color: red;
}

</style>
@if(Cart::count() > 0)
    <div class="block-cart">
        <div class="container">
            <div class="cart-top">
                @php $total = 0; @endphp
                <table>
                    <thead>
                        <tr class="cart-table-header">
                            <td>Tên sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Đơn giá(VNĐ)</td>
                            <td>Tổng giá</td>
                            <td class="cart-destroy" style="cursor: pointer" onclick="window.location.href = '/cart/destroy'">Xóa</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            @php
                                $price = $cart->price;
                                $priceEnd = $price * $cart->qty;
                                $total += $priceEnd;
                            @endphp
                            <tr>
                                <td>
                                    <a class="cart-top-thumb-img thumb-cover" href="">
                                        <img src="{{$cart->options->image}}" alt="">
                                    </a>
                                    <a class="cart-title-pro" href="">{{$cart->name}} - {{$cart->options->capacity}}GB - {{$cart->options->color}}</a>
                                </td>
                                <td>
                                    <div class="quanlity-number-td">
                                        <form action="">
                                            @csrf
                                            <input class="form-control updateCart" type="number" id="quantity1" name="updateCart" min="1" value="{{$cart->qty}}" data-rowid = "{{$cart->rowId}}"> 
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-price">
                                        {{number_format($cart->price, 0, ',', '.')}} đ
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-price">
                                        {{number_format($priceEnd, 0, ',', '.')}} đ
                                    </div>
                                </td>
                                <td>
                                    <a class="cart-btn-delete" href="/cart/delete/{{$cart->rowId}}"><i class="fal fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="cart-total-price fright">
                    Thành tiền: <span>{{number_format($total, 0, ',', '.')}} VNĐ</span>
                </div>
                <div class="cboth"></div>
            </div><!-- end cart top-->
            <div class="cart-bottom">
                <div class="cart-bottom-header">
                    Thông tin đặt hàng
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="form-ct-item form-ct-item-col2 fleft">
                        <label for="">Họ và tên</label>
                        <input type="text" name="name">
                    </div>    
                    <div class="form-ct-item form-ct-item-col2 fleft">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address">
                    </div>    
                    <div class="form-ct-item form-ct-item-col2 fleft">
                        <label for="">Email</label>
                        <input type="text" name="email">
                    </div> 
                    <div class="form-ct-item form-ct-item-col2 fleft">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone">
                    </div>  
                    <div class="form-ct-item-col2">
                        <label for="">Chú thích đơn hàng</label>
                        <textarea name="content" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Gửi thông tin</button>       
                </form>
                <div class="cboth"></div>
            </div><!--end cart-bottom-->
        </div>
    </div>
@else
    
    <div class="module no-item" style="text-align: center; margin-top: 50px;">
        
        <i style="font-size:30px; margin-bottom:30px;" class="far fa-frown"></i>
        <p style="font-size: 22px; font-weight: 300;margin-bottom:30px;">Không có sản phẩm nào trong giỏ hàng, vui lòng tải lại trang</p>
        <a href="/" class="btn btn-default btn-sm" style="margin-top: 30px;color:red;">Quay về trang chủ</a>
    </div>
@endif
@endsection