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
                <a href="">{{$product->category->name}}</a>
                <i class="fas fa-chevron-right"></i>
            </li>
            <li>
                <a href="/detail/{{$product->slug}}/{{$product->id}}">{{$product->name}}</a>
            </li>
        </ul>
        <div class="cboth"></div>
    </div>
</div><!--end block-item -->
<div class="single-content-top">
    <div class="container">
        <div class="single-content-top-left fleft">
            <h1 class="single-title fleft">{{$product->name}}</h1>
            <div class="pro-item-star fleft">
                    @if (count($product->productComments) != 0)
                    
                    <span class="pro-item-start-rating">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $avgRating)
                                <i class="star-bold far fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </span>
                    @endif
                    <span >
                        {{count($product->productComments)}} đánh giá
                    </span>
                </div>
        </div>
        <div class="single-content-top-right firght">
            
        </div>
        <div class="cboth"></div>
    </div>
</div><!--end single top -->


<div class="single-bottom">
    <div class="container">
        <div class="single-content-bottom">
            <div class="single-content-box fleft bsize">
                <div class="single-bottom-img owl-carousel owl-theme">

                    <a class="single-bottom-thumb thumb-cover" href="{{$product->image}}" data-fancybox="single-thumb" data-caption>
                        <img src="{{$product->image}}" alt="">
                    </a>
                    

                </div>
                <div class="single-img-owl owl-carousel owl-theme">
                    @foreach ($product->productImages as $productImage)
                        <a class="slider-sub-thumb thumb-cover fleft">
                            <img src="{{$productImage->path}}" alt="">
                        </a>
                    @endforeach
                    
                   

                </div>
            </div>
            <div class="single-content-box fleft">
                <div class="single-price">
                    @if (isset($product->discount))
                        <span class="pro-item-price-ins">{{number_format($product->price, 0, ',', '.')}}đ</span>
                        <span class="pro-item-price-del">{{number_format($product->discount, 0, ',', '.')}}đ</span>
                    @else
                        <span class="pro-item-price-ins">{{number_format($product->price, 0, ',', '.')}}đ</span>
                    @endif
                </div>
                <form action="" method="GET">
                    <div class="single-link">
                        @foreach ($productCapacitys as $key => $productCapacity)
                            <a class="single-link-item fleft {{ $key == 0 ? 'active' : '' }}">
                                <i class="fas fa-check-circle"></i>
                                <input type="hidden" name="capacity" value="{{$productCapacity}}">
                                <strong>{{$productCapacity}}GB</strong><br>
                                @if (isset($product->discount))
                                    <span>{{number_format($product->discount, 0, ',', '.')}}đ</span>
                                @else
                                    <span>{{number_format($product->price, 0, ',', '.')}}đ</span>
                                @endif
                               
                            </a>
                        @endforeach
                        <div class="cboth"></div>
                    </div>
                  
                    <div class="single-color">
                        <div class="single-color-title">
                            Chọn màu để xem giá
                        </div>
                        <ul class="single-color-nav">
                            @foreach ($productColors as $key =>  $productColor)
                                    <li class="single-color-nav-li {{ $key == 0 ? 'active' : '' }}">
                                        <i class="fas fa-check-circle"></i>
                                        <a class="single-color-thumb thumb-cover fleft" href="">
                                            <img src="asset/images/product/iphone_13-_pro-5_4_1.jpg" alt="">
                                            
                                        </a>
                                        <p>
                                            <input type="hidden" name="color" value="{{$productColor}}">
                                            <strong>{{$productColor}}</strong>
                                            @if (isset($product->discount))
                                                <span>{{number_format($product->discount, 0, ',', '.')}}đ</span>
                                            @else
                                                <span>{{number_format($product->price, 0, ',', '.')}}đ</span>
                                            @endif
                                        </p>
                                    </li>
                            @endforeach
                            
                            
                            <div class="cboth"></div>
                        </ul>
                        
                    </div>
                    <div class="single-cart">
                        <button formaction="/cart/buy-now/{{$product->id}}" type="submit" class="single-cart-btn bsize fleft">
                            <strong>Mua ngay</strong><br>
                            <span>Xét duyệt qua điện thoại</span>
                        </button>
                        <button formaction="/cart/add/{{$product->id}}" type="submit" class="single-cart-btn bsize fright">
                            <strong>Thêm vào giỏ hàng</strong><br>
                            <span>(Giao hàng tận nơi)</span>
                        </button>
                        <div class="cboth"></div>
                    </div>
                </form>
                <div class="single-box-khuyenmai bsize">
                    <div class="single-km-title">
                        ƯU ĐÃI THÊM
                    </div>
                    <div class="single-km-content">
                        <ul>
                            <li>
                                <a href="">Thu cũ đổi mới - Trợ giá tốt nhất</a>
                            </li>
                            <li>
                                <a href="">Giảm thêm tới 1% cho thành viên Smember</a>
                            </li>
                            <li>
                                <a href="">Giảm 5% tối đa 500k khi thanh toán bằng ví Moca trên ứng dụng Grab (áp dụng đơn hàng từ 500k)</a>
                            </li>
                            <li>
                                <a href="">Giảm 500.000đ khi thanh toán hoặc trả góp từ 5 triệu trở lên bằng thẻ tín dụng FE Credit</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-content-box fleft">
                <div class="single-content-info">
                    <div class="single-content-info-title">
                        Thông số kỹ thuật
                    </div>
                    <div class="single-content-info-des">
                        {{-- <table id="tskt">
                            <tbody>
                                <tr>
                                    <th>Kích thước màn hình</th>
                                    <th>7.6 inches</th>
                                </tr>
                                <tr>
                                    <th>Tính năng màn hình</th>
                                    <th>HDR10<br>Dolby Vision<br>True-tone</th>
                                </tr>
                                <tr>
                                    <th>Camera sau</th>
                                    <th>Camera góc rộng: 12 MP, f/1.8, 26mm, Dual Pixel PDAF, OIS <br> Camera tele: 12 MP, f/2.4, 52mm, PDAF, OIS, 2x Zoom quang học <br> Camera góc siêu rộng: 12 MP, f/2.2 <br> Camera màn hình phụ: 10MP, f/2.2</th>
                                 </tr>
                                <tr>
                                    <th>Camera trước</th>
                                    <th>Camera ẩn dưới màn hình: 4MP, f/1.8</th>
                                </tr>
                                <tr>
                                    <th>Chipset</th>
                                    <th>Snapdragon 888 5G (5 nm)</th>
                                </tr>
                                <tr>
                                    <th>Dung lượng RAM</th>
                                    <th>12 GB</th>
                                </tr>
                                <tr>
                                    <th>Bộ nhớ trong</th>
                                    <th>512 GB</th>
                                </tr>
                                <tr>
                                    <th>Pin</th>
                                    <th>Li-Po 4400 mAh</th>
                                </tr>
                                <tr>
                                    <th>Thẻ SIM</th>
                                    <th>2 SIM (nano‑SIM và eSIM)</th>
                                </tr>
                                <tr>
                                    <th>Hệ điều hành</th>
                                    <th>Android 11</th>
                                </tr>
                                <tr>
                                    <th>Loại CPU</th>
                                    <th>1 nhân 2.84 GHz, 3 nhân 2.42 GHz &amp; 4 nhân 1.8 GHz</th>
                                </tr>
                                <tr>
                                    <th>Kích thước</th>
                                    <th>Khi gập:158.2 x 67.1 x 16mm <br> Khi mở:158.2 x 128.1 x 6.4mm</th>
                                </tr>
                            </tbody>
                        </table> --}}
                        {!! $product->content !!}
                    </div>
                    <div class="single-content-info-btn">
                        <a href="#popup-info" data-fancybox="" class="">Xem chi tiết</a>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="cboth"></div>
    </div><!--end container -->
</div><!--end single-bottom -->

<div class="single-related">
    <div class="container">
        <div class="block-item-header">
            <div class="block-item-title">
                Sản phẩm tương tự
            </div>
        </div>
        <div class="block-item-content block-content-flex">

            @foreach ($relatedProducts as $related)
                @php
                    //rating
                    $avgRating_related = 0;
                    $sumRating = array_sum(array_column($related->productComments->toArray(), 'rating'));
                    $countRating = count($related->productComments);
                    if($countRating != 0){
                        $avgRating_related = $sumRating/$countRating;
                    }
                @endphp
                <div class="pro-item bsize fleft">
                    <a href="/detail/{{$related->slug}}/{{$related->id}}" class="pro-item-thumb thumb-cover">
                        <div class="pro-item-thumb-inner">
                            <img src="{{$related->image}}" alt="">
                            @if (isset($product->discount))
                                <span class="pro-item-sale">Giảm {{ceil(100 -($product->price)*100/($product->discount))}}%</span>
                            @endif
                        </div>
                    </a>
                    <div class="pro-item-info">
                        <h2 class="pro-item-title">
                            <a href="/detail/{{$related->slug}}/{{$related->id}}">{{$related->name}}</a>
                        </h2>
                        <div class="pro-item-price">
                            @if (isset($product->discount))
                                <span class="pro-item-price-ins">{{number_format($product->price, 0, ',', '.')}}đ</span>
                                <span class="pro-item-price-del">{{number_format($product->discount, 0, ',', '.')}}đ</span>
                            @else
                                <span class="pro-item-price-ins">{{$product->price}}đ</span>
                            @endif
                        </div>
                        <div class="pro-item-des">
                            {{$related->description}}
                        </div>
                        @if (count($related->productComments) != 0)
                            <div class="pro-item-star">
                                <span class="pro-item-start-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $avgRating_related)
                                            <i class="star-bold far fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    
                                </span>
                                <span >
                                    {{count($related->productComments)}} đánh giá
                                </span>
                            </div>
                        @endif
                    </div>
                </div><!-- end pro-item -->
            @endforeach


        </div>
    </div><!--end container -->
</div><!--end single related -->

<div class="single-nd">
    <div class="container">
        <div class="single-content">
            <h2>Đánh giá {{$product->name}} - Kích thước nhỏ gọn, hiệu năng đỉnh cao</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ipsum deleniti repellendus nam deserunt vitae ullam amet quos! Nesciunt, quo. Lorem, ipsum dolor. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, vitae numquam! Vitae alias ullam voluptatibus asperiores fugit ea soluta consectetur adipisci enim, impedit odit quisquam, ut, numquam voluptatem quas cum!</p>

            <blockquote>
                <p>ipsum deleniti repellendus nam deserunt vitae ullam amet quos! Nesciunt, quo. Lorem, ipsum dolor. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, vitae numquam! VitaeLorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ipsum deleniti repellendus nam deserunt vitae ullam amet quos! Nesciunt, quo. Lorem, ipsum dolor.</p>
            </blockquote>
            <p style="text-align: center;"><img src="asset/images/product/iphone_13-_pro-5_4_1.jpg" alt=""></p>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, vitae numquam! Vitae alias ullam voluptatibus asperiores fugit ea soluta consectetur adipisci enim, impedit odit quisquam, u Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ipsum deleniti repellendus nam deserunt vitae ullam amet quos! Nesciunt, quo. Lorem, ipsum dolor. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, vitae numquam! Vitae alias ullam voluptatibus asperiores fugit ea soluta consectetur adipisci enim, impedit odit quisquam, ut, numquam voluptatem quas cum!</p>
            <p style="text-align: center;"><img src="asset/images/product/iPhone-12-mini-4.jpg" alt=""></p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ipsum deleniti repellendus nam deserunt vitae ullam amet quos! Nesciunt, quo. Lorem, ipsum dolor. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, vitae numquam! Vitae alias ullam voluptatibus asperiores fugit ea soluta consectetur adipisci enim, impedit odit quisquam, ut, numquam voluptatem quas cum! repellendus nam deserunt vitae ullam amet quos! Nesciunt, quo. Lorem, ipsum dolor. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, vitae numquam! Vitae alias ullam voluptatibus asperiores fugit ea soluta consectetur adipisci enim, impedit odit quisquam, ut, numquam voluptatem quas cum!</p>
        
        </div>

        
        <div class="single-content-show-more">
            <a class="btn-show-more">Xem thêm <i class="fas fa-chevron-down"></i></a>
            <a class="btn-show-more btn-rutgon">Thu gọn <i class="far fa-angle-up"></i></a>
        </div>
    </div><!--end container -->
</div><!--end single content -->

<div class="single-start">
<div class="container">
    <div class="single-start-title">
        Đánh giá & nhận xét {{$product->name}}
    </div>
    <div class="single-start-top">
        <div class="single-start-top-right">
            <p class="rating-average">{{round($avgRating, 2)}}/5</p>
            <div class="pro-item-start-rating">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $avgRating)
                        <i class="star-bold far fa-star"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </div>
            <div class="single-start-top-total">
                <strong>{{count($product->productComments)}}</strong> đánh giá & nhận xét
            </div>
        </div>
        <div class="single-start-top-left">
            <p class="single-vote-sub-title">Bạn đánh giá sao sản phẩm này?</p>
            <a class="single-vote-btn" href="#popup-rating" data-fancybox>Đánh giá ngay</a>
        </div>
        <div class="cboth"></div>
    </div>
    <p>@include('admin.alert')</p>
    <div class="single-start-bottom">
        <form action="">
            @csrf
            <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}">
            <div class="block-item-content" id="comments">
                
                
            </div>
        </form>
    </div>
    <div class="cboth"></div>
</div><!--end container-->
</div><!--end single-start-->  


<div class="dnone">
    <div class="popup-info" id="popup-info" style="width=564px;">
        <div class="single-content-info-title">
            Thông số kỹ thuật
        </div>
        <div class="single-content-info-des">
            {!! $product->content !!}
        </div>
    </div>
</div><!--end -->
<div class="dnone">
    <div class="popup-rating" id="popup-rating">
        <div class="poup-header">
            <p>Đánh giá và nhận xét sản phẩm</p>
        </div>
        <form action="" method="" enctype="multipart/form-data">
            @include('admin.alert')
            <input type="text" name="name" id="name" placeholder="Họ và tên" class="cps-input comment_name" required>
            <input type="text" name="phone" id="phone" placeholder="Số điện thoại" class="cps-input comment_phone" required>
            <textarea id="messages" name="messages" rows="4" cols="5" placeholder="Xin mời chia sẻ một số cảm nhận về sản phẩm..." class="cps-textarea comment_content"></textarea>
            <div class="rate">
                <p class="rate-title">Bạn cảm thấy sản phẩm như thế nào?</p>
                <input type="radio" id="star5" name="rating" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <button type="button" data-fancybox-close class="btn-submit send_comment">Gửi đánh giá</button>
        </form>
    </div>
</div>
@endsection

