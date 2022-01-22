
<Footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-item fleft">
                <div class="footer-item-content">
                    <div class="footer-item-content-title">
                        Tìm cửa hàng
                    </div>
                    <div class="footer-item-content-contact">
                        <a href="">Tìm của hàng gần nhất</a>
                        <a href="">Mua hàng từ xa</a>
                        <a href="">Gặp trực tiếp của hàng nhất nhất</a>
                    </div>
                    <div class="footer-item-content-title">
                        Phương thức thanh toán
                    </div>
                    <div class="footer-item-content-visa">
                        <a class="" href="">
                            <img src="asset/images/Logo/mastercard.png" alt="">
                        </a>
                        <a class="" href="">
                            <img src="asset/images/Logo/visa (1).png" alt="">
                        </a>
                        <a class="" href="">
                            <img src="asset/images/Logo/cash.png" alt="">
                        </a>
                        <a class="" href="">
                            <img src="asset/images/Logo/internet-banking.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-item fleft">
                <div class="footer-item-content-contact">
                    <p>Gọi mua hàng: 1800.2044 (8h00 - 22h00)</p>
                    <p>Gọi mua hàng: 1800.2044 (8h00 - 22h00)</p>
                    <p>Gọi mua hàng: 1800.2044 (8h00 - 22h00)</p>
                </div>
                <div class="footer-item-content-title">
                    Đối tác dịch vụ bảo hành
                </div>
                <div class="footer-item-content-visa">
                    <p>Điện thoại - máy tính</p>
                    <a class="footer-item-logodtv thumb-cover" href="">
                        <img src="asset/images/Logo/logodtv.png" alt="">
                    </a>
                </div>
            </div>
            <div class="footer-item fleft">
                <div class="footer-item-content-contact">
                    <a href="">Mua hàng và thanh toán Online</a>
                    <a href="">Mua hàng trả góp Online</a>
                    <a href="">Gặp trực tiếp của hàng nhất nhất</a>
                    <a href="">Mua hàng và thanh toán Online</a>
                    <a href="">Mua hàng trả góp Online</a>
                    <a href="">Gặp trực tiếp của hàng nhất nhất</a>
                    <a href="">Mua hàng và thanh toán Online</a>
                    <a href="">Mua hàng trả góp Online</a>
                    <a href="">Gặp trực tiếp của hàng nhất nhất</a>
                </div>
            </div>
            <div class="footer-item fleft">
                <div class="footer-item-content-contact">
                    <a href="">Quy chế hoạt động</a>
                    <a href="">Chính sách Bảo hành</a>
                    <a href="">Liên hệ hợp tác kinh doanh</a>
                    <a href="">Đơn Doanh nghiệp</a>
                    <a href="">Ưu đãi từ đối tác</a>
                    <a href="">Tuyển dụng</a>
                </div>
            </div>
            <div class="cboth"></div>
        </div><!-- end footer top -->
    </div><!--end container -->
</Footer><!--end footer-->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="asset/js/custom.js"></script>
<script type="text/javascript" src="asset/plugins/owlcarousel/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('.owl-slider').owlCarousel({
            autoplay: true,
            items:1,
            dots:false,
            loop:false,
            center:true,
            margin:10,
            URLhashListener:true,
            autoplayHoverPause:true,
            startPosition: 'URLHash'
        });
    });
</script>

{{-- js detail --}}
<script type="text/javascript">
    $(document).ready(function(){
        $(".single-bottom-img").owlCarousel({
            autoplay: true,
            slideSpeed : 3000,
            autoplayTimeout:3000,
            items : 1,
            nav:true,
            loop:false,
            dots:false,
            singleItem : true,
        });
    });
</script>
<script type="text/javascript">
    $('.single-img-owl').owlCarousel({
            loop:true,
            margin:25,
            nav:true,
            dots:false, 
            responsive:{
                0:{
                    items:2
                },
                720:{
                    items:2
                },
                1000:{
                    items:5
                },
                1190:{
                    items:5
                }
            }
});
</script>
<script type="text/javascript">
    $(document).on('click', '.slider-sub-thumb img', function () {
        $('.single-bottom-thumb img').attr('src', $(this).attr('src'));
        $('.single-bottom-thumb').attr('href', $(this).attr('src'));
    });
    $(document).ready(function(){
        $('.single-content-show-more').on('click', function(){
            $('.single-nd').toggleClass('active');
        });
    }); 
</script>


{{-- js trang category product --}}

<script type="text/javascript">
    $(document).ready(function(){
        $(".owl-slider-cat").owlCarousel({
            autoplay: true,
            slideSpeed : 4000,
            autoplayTimeout:4000,
            items : 1,
            nav:true,
            loop:false,
            dots:false,
            singleItem : true,
        });
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.cat-slider-thumb img', function () {
        $('.img-test img').attr('src', $(this).attr('src'));
    });
</script>

<script type="text/javascript">
    // $(document).ready(function(){
    //   $('.filter-item' '.filter-item-btn').on('click', function(){
    //     $('.filter-item').children().next().removeClass('dblock');
    //        $(this).children().next().toggleClass('dblock');
    //     });
    // }); 
    $(document).ready(function(){
        $('.filter-item').on('click', function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
            }else{
                $('.filter-item').removeClass('active');
                $(this).addClass('active');
            }  
        });
    }); 
</script>



{{-- load-comment --}}
<script>
    $(document).ready(function(){
        load_comment();

        function load_comment(){
            var product_id = $('.product_id').val();
            //var user_id = $('.user_id').val();
            var _token = $('input[name = "_token"]').val();

            $.ajax({
                url : '/load-comment',
                method : 'POST',
                data : {product_id : product_id , _token : _token},
                success : function(data){
                    $('#comments').html(data);
                    console.log(123);
                } 
            });
        }

        $('.send_comment').click(function(){
            var product_id = $('.product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var comment_phone = $('.comment_phone').val();
            var comment_rating = $("input[name='rating']:checked").val();
            
            var _token = $('input[name = "_token"]').val();

            $.ajax({
                url : '/send-comment',
                method : 'POST',
                data : {product_id : product_id , comment_name : comment_name ,comment_content : comment_content,comment_phone : comment_phone , comment_rating : comment_rating ,_token : _token},
                success : function(data){
                    load_comment();
                } 
            });
        })

    });
</script>


<!-- Updatecart    -->
<script>
  
      
    $('.updateCart').change(function(){
       const qty = $(this).val();
       const rowId = $(this).data('rowid');
       var _token = $('input[name = "_token"]').val();

       $.ajax({
         url : "cart/update",
         method : "GET",
         data : {qty : qty , rowId : rowId , _token : _token},
         success : function(data){
           location.reload();
         },
         error : function(error){
           alert('Lỗi');
         }
       });
   });


</script>


<!-- loadMore -->
{{-- <script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    var categoryName = $('#categoryName').val();
    
    infinteLoadMore(page);

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            infinteLoadMore(page);
        }
    });

    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + '/shop' + '/' + categoryName + '/?page=' + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append(response);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }

</script> --}}



<script type="text/javascript">
	var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    var categoryName = $('#categoryName').val();

	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});

	function loadMoreData(page){
	  $.ajax(
	        {
	            url: ENDPOINT + '/shop' + '/' + categoryName + '/?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
                
	            if(data.length == 0){
	                $('.ajax-load').html("We don't have more data to display :(");
                    console.log(`We don't have more data to display :(`);
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#post-data").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
                console.log('Server error occured');
	        });
	}
</script>


{{-- active tag home --}}
<script>
    $( 'ul.single-color-nav' ).on( 'click', '.single-color-nav-li', function() {
        var $item = $(this);

        $item.siblings().removeClass('active');
        $item.addClass('active');

    } );

    $( '.single-link' ).on( 'click', '.single-link-item', function() {
        var $item = $(this);

        $item.siblings().removeClass('active');
        $item.addClass('active');

    } );

    
</script>



<script>
    $( '.block-item-header-right' ).on( 'click', '.item', function() {
        var $item = $(this);

        $item.siblings().removeClass('active-tag');
        $item.addClass('active-tag');

    } );

   
</script>
