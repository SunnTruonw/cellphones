@extends('layouts')



@section('content')
@php
    $categoryHtml = App\Helpers\Helper::categories($categories);
    
@endphp
<div class="home-fea">
    <div class="container">
        <div class="home-fea-left fleft">
            <div class="main-nav">
                
                {!! $categoryHtml !!}

            </div>
        </div><!--end home-fea-left -->
        <div class="home-fea-right fright">
            
                <div class="home-fea-slider fleft">
                    <div class="owl-carousel owl-slider owl-theme">
                        @foreach ($sliders as $slider)
                            <a class="home-slider-item thumb-cover" href="/" data-hash="1">
                                <img src="{{$slider->image}}" alt="k1">
                            </a>
                        @endforeach
                    </div>
                    <div class="slider-nav">
                        @foreach ($sliders as $slider)
                            <a href="/">
                                <span>{{$slider->title}}</span><br>
                                    {{$slider->description}}
                            </a>
                        @endforeach
                        
                        <div class="cboth"></div>
                    </div>
                </div>
            
            <div class="home-fea-banner fright">
                <a class="home-fea-banner-item thumb-cover" href="/">
                    <img src="asset/images/banner/banner-con1.jpg" alt="">
                </a>
                <a class="home-fea-banner-item thumb-cover" href="/">
                    <img src="asset/images/banner/banner-con2.jpg" alt="">
                </a>
                <a class="home-fea-banner-item thumb-cover" href="/">
                    <img src="asset/images/banner/banner-con3.jpg" alt="">
                </a>
                <div class="cboth"></div>
            </div>
            <div class="cboth"></div>
        </div>
        <div class="cboth"></div>
    </div><!--end container-->
</div><!--end hom fea-->
     @foreach ($category_home->take(4) as $cate)
        @if($cate->parent_id == 0)
            <div class="block-item">
                <div class="container">
                    <div class="block-item-header">
                        <div class="block-item-header-left fleft">
                            <span class="block-item-title">{{$cate->name}}</span>
                        </div>
                        
                        <div class="block-item-header-right fright">
                            <ul class="block-item-nav">
                                @foreach ($category_home as $cate_tag)
                                    @if ($cate_tag->parent_id == $cate->id)
                                        <li class="item"><a href="/shop/{{$cate->slug}}?type={{$cate_tag->name}}">{{$cate_tag->name}}</a></li>
                                    @endif
                                @endforeach
                                <li class="item"><a href="/shop/{{$cate->slug}}">Xem tất cả</a></li>
                            </ul>
                        </div>
                        <div class="cboth"></div>
                    </div>
                    
                    <div class="block-item-content block-content-flex ">
                        @foreach ($cate->products->take(10) as $product)
                            @php
                                //rating
                                $avgRating = 0;
                                $sumRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
                                $countRating = count($product->productComments);
                                if($countRating != 0){
                                    $avgRating = $sumRating/$countRating;
                                }
                            @endphp
                            <div class="pro-item bsize fleft">
                                <a href="/detail/{{$product->slug}}/{{$product->id}}" class="pro-item-thumb thumb-cover">
                                    <div class="pro-item-thumb-inner">
                                        <img src="{{$product->image}}" alt="">
                                        @if (isset($product->discount))
                                            <span class="pro-item-sale">Giảm {{ceil(100 -($product->price)*100/($product->discount))}}%</span>
                                        @endif
                                        
                                    </div>
                                </a>
                                <div class="pro-item-info">
                                    <h2 class="pro-item-title">
                                        <a href="">{{$product->name}}</a>
                                    </h2>
                                    <div class="pro-item-price">
                                        @if (isset($product->discount))
                                            <span class="pro-item-price-ins">{{number_format($product->price, 0, ',', '.')}}đ</span>
                                            <span class="pro-item-price-del">{{number_format($product->discount, 0, ',', '.')}}đ</span>
                                        @else
                                            <span class="pro-item-price-ins">{{number_format($product->price, 0, ',', '.')}}đ</span>
                                        @endif
                                    </div>
                                    <div class="pro-item-des">
                                        {{$product->description}}
                                    </div>
                                    @if (count($product->productComments) != 0)
                                        <div class="pro-item-star">
                                            <span class="pro-item-start-rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $avgRating)
                                                        <i class="star-bold far fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                                
                                            </span>
                                            <span >
                                                {{count($product->productComments)}} đánh giá
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- end pro-item -->
                        @endforeach
                        
                        
                    </div>
                </div><!--end container-->
            </div><!--end block item-->
        @endif
   

    @endforeach

    <div class="block-item">
        <div class="container">
            <div class="block-item-header">
                <div class="block-item-header-left">
                    <span class="block-item-title">Trang chuyên thương hiệu</span>
                <div class="cboth"></div>
                </div>
            </div>
        
            <div class="block-item-content">
                <div class="item-thuong-hieu fleft bsize">
                    <a href="" class="item-thuong-hieu-thumb thumb-cover">
                        <img src="asset/images/product/th1.jpg" alt="">
                    </a>
                </div>
                <div class="item-thuong-hieu fleft bsize">
                    <a href="" class="item-thuong-hieu-thumb thumb-cover">
                        <img src="asset/images/product/th2.jpg" alt="">
                    </a>
                </div>
                <div class="item-thuong-hieu fleft bsize">
                    <a href="" class="item-thuong-hieu-thumb thumb-cover">
                        <img src="asset/images/product/th3.jpg" alt="">
                    </a>
                </div>
                <div class="item-thuong-hieu fleft bsize">
                    <a href="" class="item-thuong-hieu-thumb thumb-cover">
                        <img src="asset/images/product/th4.jpg" alt="">
                    </a>
                </div>
                <div class="cboth"></div>
            </div>
        </div><!-- end container -->
    </div><!--end block-item -->
@endsection