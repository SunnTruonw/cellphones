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
                <a href="/shop/{{ \Str::slug($title) }}">{{$title}}</a>
            </li>
           
        </ul>
        <div class="cboth"></div>
    </div>
</div><!--end block-item -->

<div class="block-item">
    <div class="container">
        <div class="block-cat-slider fleft ">
            <div class="owl-slider-cat owl-theme owl-carousel">
                 <a   class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner22.jpg" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/fold-3-rr-690-300-max_1.png" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/ss-mngn-690-300-max.png" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
                <a  class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="block-cat-slider fright">
            <div class="owl-slider-cat owl-theme owl-carousel">
                 <a href="" class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
                <a href="" class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner22.jpg" alt="">
                </a>
                <a href="" class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
                <a href="" class="cat-slider-thumb thumb-cover">
                    <img src="asset/images/banner/banner.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="cboth"></div>
    </div>
</div><!--end block-item -->

<div class="block-item">
    <div class="container">
        <div class="block-item-header">
            <div class="block-item-title">
                Chọn theo tiêu chí
            </div>
        </div>
        <div class="block-item-content">
            <div class="filter-item fleft bsize">
                <a  class="filter-item-btn">
                    Giá <i class="fas fa-chevron-down fa-sm"></i>
                </a>
                <div class="filter-item-box">
                    <a class="{{Request::get('price') == 1 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => '1']) }}">Dưới 3 triệu</a>
                    <a class="{{Request::get('price') == 2 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => '2']) }}">6 - 9 triệu</a>
                    <a class="{{Request::get('price') == 3 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => '3']) }}">9 - 12 triệu</a>
                    <a class="{{Request::get('price') == 4 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => '4']) }}">12 - 15 triệu</a>
                    <a class="{{Request::get('price') == 5 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['price' => '5']) }}">Trên 15 triệu</a>
                </div>
            </div>
        
            <div class="filter-item fleft bsize">
                <a  class="filter-item-btn">
                    Loại <i class="fas fa-chevron-down fa-sm"></i>
                </a>
                <div class="filter-item-box">

                    @foreach ($categories as $cate_tag)
                        {{-- lay het ra danh muc com --}}
                        @if ($cate_tag->parent_id == $category->id)
                            <a class="{{Request::get('ram') == 1 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['type' => $cate_tag->name]) }}">{{$cate_tag->name}}</a>
                        @endif
                    @endforeach

                        
                </div>
            </div>
            <div class="filter-item fleft bsize">
                <a  class="filter-item-btn">
                    Dung lượng ram <i class="fas fa-chevron-down fa-sm"></i>
                </a>
                <div class="filter-item-box">
                    <a class="{{Request::get('ram') == 1 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['ram' => '1']) }}">Dưới 4GB</a>
                    <a class="{{Request::get('ram') == 2 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['ram' => '2']) }}">4GB - 6GB</a>
                    <a class="{{Request::get('ram') == 3 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['ram' => '3']) }}">8GB - 12GB</a>
                    <a class="{{Request::get('ram') == 4 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['ram' => '4']) }}">12GB trở lên</a>
                </div>
            </div>
            <div class="filter-item fleft bsize">
                <a  class="filter-item-btn">
                    Bộ nhớ trong <i class="fas fa-chevron-down fa-sm"></i>
                </a>
                <div class="filter-item-box">
                    <a class="{{Request::get('capacity') == 1 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['capacity' => '1']) }}">Dưới 32GB</a>
                    <a class="{{Request::get('capacity') == 2 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['capacity' => '2']) }}">32GB và 64GB</a>
                    <a class="{{Request::get('capacity') == 3 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['capacity' => '3']) }}">128GB và 256GB</a>
                    <a class="{{Request::get('capacity') == 4 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['capacity' => '4']) }}">Trên 512GB</a>
                </div>
            </div>	
            
            <div class="filter-item fleft bsize">
                <a  class="filter-item-btn">
                    Kích thước màn hình <i class="fas fa-chevron-down fa-sm"></i>
                </a>
                <div class="filter-item-box">
                    <a class="{{Request::get('screen_size') == 1 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['screen_size' => '1']) }}">Dưới 6 inch</a>
                    <a class="{{Request::get('screen_size') == 2 ? 'active-tag' : ''}}" href="{{ request()->fullUrlWithQuery(['screen_size' => '2']) }}">Trên 6 inch</a>
                    
                </div>
            </div>
            <div class="filter-item fleft bsize">
                <a href="{{ request()->url() }}"  class="filter-item-btn">
                    Bỏ chọn <i class="fas fa-times fa-sm"></i>
                </a>
            </div>
        </div>
        <div class="cboth"></div>
    </div><!-- end container-->
</div><!--end block-item -->

<div class="block-item">
    <div class="container">
        <div class="block-item-header">
            <div class="block-item-title">
                Sắp xếp theo
            </div>
        </div>
        <div class="block-item-content">
            <div class="filter-item fleft bsize">
                <a href="{{ request()->fullUrlWithQuery(['sortBy' => 'desc']) }}"  class="filter-item-btn">
                    Giá cao <i class="fas fa-sort-amount-up"></i>
                </a>
            </div>
            <div class="filter-item fleft bsize">
                <a href="{{ request()->fullUrlWithQuery(['sortBy' => 'asc']) }}" class="filter-item-btn">
                    Giá thấp <i class="fas fa-sort-amount-up-alt"></i>
                </a>
            </div>
            <div class="filter-item fleft bsize">
                <a href="{{ request()->fullUrlWithQuery(['sortBy' => 'discount']) }}" class="filter-item-btn">
                    Khuyến mãi hot %
                </a>
            </div>
            <div class="filter-item fleft bsize">
                <a href="{{ request()->fullUrlWithQuery(['sortBy' => 'new']) }}"  class="filter-item-btn">
                    Trả góp 0% <i class="fas fa-hand-holding-usd"></i>
                </a>
            </div>
            <div class="filter-item fleft bsize">
                <a href="{{ request()->fullUrlWithQuery(['sortBy' => 'default']) }}"  class="filter-item-btn">
                    Xem tất cả <i class="fas fa-eye"></i>
                </a>
            </div>
        </div>
        <div class="cboth"></div>
    </div><!--end container -->
</div><!--end block-item -->

<div class="block-item">
    <div class="container">
        <input type="hidden" value="{{ \Str::slug($title) }}" id="categoryName">
        <div class="block-item-content block-content-flex" id="post-data">
            @if(count($products) > 0)
                @include('page.listProduct')
            @else
            <h2>Sản phẩm chưa cập nhật..</h2>
            @endif
        </div>

        <!-- Data Loader -->
        
        <div class="ajax-load text-center" style="text-align: center">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
        
        <div class="cboth"></div>
    </div><!--end container -->
</div><!--end block-item -->


@endsection
