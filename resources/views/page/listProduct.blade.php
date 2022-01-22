
                @foreach ($products as $product)
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
                                    @for($i = 1; $i <= 5; $i++) @if($i <=$avgRating) <i class="star-bold far fa-star"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor

                                </span>
                                <span>
                                    {{count($product->productComments)}} đánh giá
                                </span>
                            </div>
                            @endif
                        </div>
                    </div><!-- end pro-item -->

                @endforeach

            