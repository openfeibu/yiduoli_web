<style>
    .pageBanner{display: none;}
</style>
<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb',['product_category_id' => $product->product_category_id])->render() !!}
    </div>
    <div class="product-main">

        <div class="container w1400">
            <div class="pro-detail-con">
                <div class="pro-detail-con-t clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                    <div class="pro-detail-img pull-left ">
                        <div class="swiper-container swiper-container-pro">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $key => $image)
                                    <div class="swiper-slide">
                                        <a href="{{ '/image/original'.$image }}"><img alt="{{ $product->title }}" src="{{ '/image/original'.$image }}" width="100%"></a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination swiper-pagination-pro"></div>
                        </div>
                    </div>
                    <div class="pro-detail-test">
                        <div class="pro-title">{{ $product->title }}</div>
                        <div class="pro-des">{{ $product->description }}</div>
                        <div class="pro-btn clearfix">
						  @foreach($academic_reports as $academic_report_key => $academic_report)
                            <div class="btn-buy transition500" ><a style="color:#fff" href="{{ url('/image/original'.$academic_report->file) }}" target="_blank">{{ $academic_report->title  }}</a></div>
						 @endforeach
                        </div>
                    </div>
                </div>
                <div class="pro-detail-con-c clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                    <div class="news-detail-right pull-right">
                        @if($product->vid)
                        <div class="news-detail-right-t">产品视频</div>
                        <div id="playerBox">
                            <div id='pro-player'></div>
                        </div>
                        @endif
                       <!-- @if(count($academic_reports))
                        <div class="news-detail-right-t">产品文档</div>
                        <div class="document-con">
                            @foreach($academic_reports as $academic_report_key => $academic_report)
                            <div class="document-item wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".1s">
                                <div class="img">
                                    <img src="{!! theme_asset('images/pdf.png') !!}" alt="" />
                                </div>
                                <div class="test">
                                    <p><a href="{{ url('/image/original'.$academic_report->file) }}" target="_blank">{{ $academic_report->title  }}.pdf</a></p>
                                    <span>{{ $product->created_at->format('Y-m-d') }}</span>
                                </div>
                                <div class="down">
                                    <a href="{{ url('/image/download'.$academic_report->file) }}"></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif-->
                    </div>

                    <div class="pro-detail-con-c-left pull-left">
                        <div class="news-detail-right-t">产品详情</div>
                        <div class="pro-detail-detail">
                            {!! $product->content !!}
                        </div>
                    </div>
                    @if(count($related_products))
                    <div class="news-detail-right pull-right">
                        <div class="news-detail-right-t">相关产品</div>
                        <div class="news-detail-right-c">
                            @foreach($related_products as $key => $related_product)
                                <div class="news-detail-right-c-item clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".1s">
                                    <a class="clearfix" href="{{ route('pc.product.show',$related_product->id) }}"  >
                                        <div class="img"><img class="transition500" src="{{ '/image/original'.$related_product->image }}" alt="{{ $related_product->title }}"></div>
                                        <div class="test">
                                            <p class="fb-overflow-2">{{ $related_product->title }}</p>
                                            <span>{{ $related_product->created_at->format('Y-m-d') }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>

{!! Theme::asset()->container('player')->scripts() !!}

<script>
    $(function() {
        var mySwiper = new Swiper('.swiper-container-pro', {
            loop: true,
            autoplay: 6000,
            autoHeight: true,
            pagination: '.swiper-pagination-pro',
            paginationClickable :true
        });


      
        /*
        $(".page-news-video").on("click",function(){
            var vid = $(this).attr("vid");
            var des = $(this).attr("des");
            $("#player").html("")
            $(".video-detail").fadeIn(200)
            var width = document.getElementById("playerBox").scrollWidth;
            var height = width*0.5625; // 16/9 = 0.5625;
            var player = polyvPlayer({
                wrap: '#pro-player',
                autoplay: false,
                // 'width': width,
                // 'height': height,
                'vid': vid
            });
            $("#playerBox .des").text(des)
        })
        */
        var width = document.getElementById("playerBox").scrollWidth;
        var height = width * 0.5625; // 16/9 = 0.5625;

        var player = polyvPlayer({
            wrap: '#pro-player',
            autoplay: false,
            height: '100%',
            'vid': '{{$product->vid }}'
        });
    
    })
</script>
