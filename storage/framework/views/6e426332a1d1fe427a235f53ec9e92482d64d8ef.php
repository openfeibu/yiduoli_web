<div class="banner">
    <div class="swiper-container swiper-container-banner">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="#"><img src="<?php echo theme_asset('images/banner.png'); ?>" width="100%"></a>
            </div>
            <div class="swiper-slide">
                <a href="#"><img src="<?php echo theme_asset('images/banner.png'); ?>" width="100%"></a>
            </div>
            <div class="swiper-slide">
                <a href="#"><img src="<?php echo theme_asset('images/banner.png'); ?>" width="100%"></a>
            </div>
        </div>
        <div class="swiper-pagination swiper-pagination-banner"></div>
    </div>
</div>
<!-- 关于我们 -->
<div class="about">
    <div class="container w1400">
        <div class="about-left col-lg-6 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <a href="#">
                <img class="transition" src="<?php echo theme_asset('images/vrBg.png'); ?>" alt="" />
                <div class="vr-text" >
                    <div class="img animated fb-bounceIn " style='animation-iteration-count: infinite;'><img src="<?php echo theme_asset('images/VR.png'); ?>" alt=""></div>
                    <span>VR720</span>
                </div>
            </a>
        </div>
        <div class="about-right col-lg-6 col-md-6 col-sm-12">
            <div class="con-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <span class="transition500">About VTR</span>
                <h1>广东溢多利生物科技股份有限公司</h1>
            </div>
            <div class="about-con fb-overflow-4 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                广东溢多利生物科技股份有限公司成立于1991年，总部位于广东省珠海市。公司专注于生物工程领域，围绕生物医药和生物农牧两大产业，研发并形成了生物酶制剂、甾体激素原料药、功能性饲料添加剂三大系列产品线，同时为行业客户持续提供整体生物技术解决方案，是我国生物酶制剂行业首家上市企业，全球极具竞争力的甾体激素医药企业。
            </div>
            <ul class="about-icon wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".6s">
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/about/profile">
                        <img class="transition500" src="<?php echo theme_asset('images/i1.png'); ?>" alt="">
                        <p>企业概况</p>
                    </a>
                </li>
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/product">
                        <img class="transition500" src="<?php echo theme_asset('images/i3.png'); ?>" alt="">
                        <p>产业布局</p>
                    </a>
                </li>
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/course/development_course">
                        <img class="transition500" src="<?php echo theme_asset('images/i4.png'); ?>" alt="">
                        <p>发展历程</p>
                    </a>
                </li>
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/course/enterprise_honor">
                        <img class="transition500" src="<?php echo theme_asset('images/i5.png'); ?>" alt="">
                        <p>企业荣誉</p>
                    </a>
                </li>
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/news_center/video">
                        <img class="transition500" src="<?php echo theme_asset('images/i2.png'); ?>" alt="">
                        <p>宣传视频</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- 产品中心 -->
<div class="product">
    <div class="container w1400">
        <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <span  class="transition500">PRODUCT</span>
            <h1>产品中心</h1>
        </div>
        <div class="product-con ">

            <?php $__currentLoopData = app('product_repository')->orderBy('updated_at','desc')->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <div class="product-item-box">
                    <a href="<?php echo e(route('pc.product.show',$product->id)); ?>">
                        <div class="img" ><img class="transition500"  src="<?php echo '/image/original'.$product->image; ?>" alt=""></div>
                        <p class="transition500"><?php echo e(get_substr($product->title,20)); ?></p>
                        <span><?php echo e(get_substr($product->description,20)); ?></span>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!--
            <div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <div class="product-item-box">
                    <a href="">
                        <div class="img" ><img class="transition500"  src="<?php echo theme_asset('images/p1.png'); ?>" alt=""></div>
                        <p class="transition500">生物农牧</p>
                        <span>根据畜禽饲料的原料结构，应用现代固体发酵，液体发酵等生物工程技术和先进的配方剂型技术</span>
                    </a>
                </div>
            </div>
            <div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="product-item-box">
                    <a href="">
                        <div class="img"><img  class="transition500" src="<?php echo theme_asset('images/p2.png'); ?>" alt=""></div>
                        <p class="transition500">生物农牧</p>
                        <span>根据畜禽饲料的原料结构，应用现代固体发酵，液体发酵等生物工程技术和先进的配方剂型技术</span>
                    </a>
                </div>
            </div>
            <div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".6s">
                <div class="product-item-box">
                    <a href="">
                        <div class="img"><img  class="transition500" src="<?php echo theme_asset('images/p3.png'); ?>" alt=""></div>
                        <p class="transition500">生物农牧</p>
                        <span>根据畜禽饲料的原料结构，应用现代固体发酵，液体发酵等生物工程技术和先进的配方剂型技术</span>
                    </a>
                </div>
            </div>
            <div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".7s">
                <div class="product-item-box">
                    <a href="">
                        <div class="img"><img  class="transition500" src="<?php echo theme_asset('images/p4.png'); ?>" alt=""></div>
                        <p class="transition500">生物农牧</p>
                        <span>根据畜禽饲料的原料结构，应用现代固体发酵，液体发酵等生物工程技术和先进的配方剂型技术</span>
                    </a>
                </div>
            </div>
            -->
        </div>
    </div>
</div>
<!-- 研发创新 -->
<div class="innovate">
    <div class="innovate-bg">
        <div class="container w1400">
            <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                <span  class="transition500">INNOVATE</span>
                <h1>研发创新</h1>
            </div>
            <div class="innovate-con">
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".4s">
                    <div class="number">
                        <span >1</span>所
                    </div>
                    <div class="name">国家认定企业技术中心</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
                    <div class="number">
                        <span >1</span>所
                    </div>
                    <div class="name">国家院士工作站</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="0.6s">
                    <div class="number">
                        <span >1</span>所
                    </div>
                    <div class="name">博士后科研工作站</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="0.7s">
                    <div class="number">
                        <span >10</span>所
                    </div>
                    <div class="name">省级工程中心</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="0.8s">
                    <div class="number">
                        <span >4</span>项
                    </div>
                    <div class="name">专有技术</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="0.9s">
                    <div class="number">
                        <span >11</span>项
                    </div>
                    <div class="name">核心技术</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="1s">
                    <div class="number">
                        <span >174</span>项
                    </div>
                    <div class="name">发明专利</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="1.1s">
                    <div class="number">
                        <span >300+</span>名
                    </div>
                    <div class="name">研发人员</div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- 集团子公司 -->
<div class="branch">
    <div class="container w1400">
        <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <span  class="transition500">BTRANCH</span>
            <h1>集团分/子公司</h1>
        </div>
        <div class="branch-con">
            <div class="branch-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".4s">

                <a href="">
                    <div class="img"><img class="transition500" src="<?php echo theme_asset('images/logo1.jpg'); ?>" alt=""></div>

                </a>
            </div>
            <div class="branch-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">

                <a href="">
                    <div class="img"><img class="transition500" src="<?php echo theme_asset('images/logo2.png'); ?>" alt=""></div>

                </a>
            </div>
            <div class="branch-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".6s">

                <a href="">
                    <div class="img"><img class="transition500" src="<?php echo theme_asset('images/logo3.png'); ?>" alt=""></div>

                </a>
            </div>
            <div class="branch-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".7s">

                <a href="">
                    <div class="img"><img class="transition500" src="<?php echo theme_asset('images/logo4.png'); ?>" alt=""></div>

                </a>
            </div>


        </div>
    </div>
</div>
<!-- 新闻中心 -->
<div class="new">
    <div class="container w1400">
        <div class="con-title tip-title  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <span  class="transition500">NEW</span>
            <h1>新闻中心</h1>
        </div>
        <div class="new-con clearfix">
            <?php $__currentLoopData = app('page_repository')->where('category_id',1)->where('hot_recommend',1)->orderBy('updated_at','desc')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key == 0): ?>
                <div class="new-left col-lg-6 col-md-6 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                    <div class="new-big-item transition500">
                        <a href="<?php echo e(route('pc.news.show',$news->id)); ?>">
                            <div class="img"><img class="transition500" src="<?php echo '/image/original'.$news->image; ?>" alt=""></div>
                            <div class="test">
                                <div class="title fb-overflow-2 transition500"><?php echo e($news->title); ?></div>
                                <div class="des">
                                    <div class="date"><?php echo e($news->updated_at->format('Y-m-d')); ?></div>
                                    <div class="more"><span>阅读详情</span></div>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="new-right col-lg-6 col-md-6 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <?php $__currentLoopData = app('page_repository')->where('category_id',1)->where('hot_recommend',1)->orderBy('updated_at','desc')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key != 0): ?>
                    <div class="new-item transition500 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="<?php echo e(route('pc.news.show',$news->id)); ?>">
                            <div class="img"><img class="transition500"  src="<?php echo '/image/original'.$news->image; ?>" alt=""></div>
                            <div class="title transition500 fb-overflow-2"><?php echo e($news->title); ?></div>

                        </a>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        var mySwiper = new Swiper('.swiper-container-banner', {
            loop: true,
            autoplay: 6000,
            autoHeight: true,
            pagination: '.swiper-pagination-banner',
            paginationClickable :true
        })
    })
</script>