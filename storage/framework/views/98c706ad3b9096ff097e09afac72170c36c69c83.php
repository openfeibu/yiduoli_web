
<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab')->render(); ?>


        <div class="news-con clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <?php if(Request::get('page','1') == 1 && isset($hot_recommend_video)): ?>
                <div class="page-news-video page-news-video-big clearfix col-lg-12 col-md-12 col-sm-12" vid="<?php echo e($hot_recommend_video->vid); ?>" des="<?php echo e($hot_recommend_video->description); ?>">
                    <div class="clearfix">
                        <div class="img pull-left">
                            <div class="play"><img class="transition500" src="<?php echo theme_asset('images/play1.png'); ?>" alt=""></div>
                            <img class="transition500" src="<?php echo e('/image/original'.$hot_recommend_video->image); ?>" alt="">
                        </div>
                        <div class="test">
                            <div class="title transition500"><?php echo e($hot_recommend_video->title); ?></div>
                            <div class="date"><?php echo e($hot_recommend_video->updated_at->format('Y-m-d')); ?></div>
                            <div class="con fb-overflow-3"><?php echo e($hot_recommend_video->description); ?></div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="page-news-video page-news-video-small clearfix col-lg-4 col-md-4 col-sm-12 col-xs-12" vid = "<?php echo e($video->vid); ?>" des="<?php echo e($video->description); ?>">
                        <div class="clearfix video-smaill-box">
                            <div class="img "><img class="transition500" src="<?php echo e('/image/original'.$video->image); ?>" alt=""></div>
                            <div class="test">
                                <div class="title transition500 fb-overflow-2">
                                    <?php echo e($video->title); ?>

                                </div>
                                <div class="date"><?php echo e($video->updated_at->format('Y-m-d')); ?></div>
                            </div>
                        </div>
                    </div>



            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <?php echo $videos->links('common.pagination'); ?>

    </div>
</div>
<?php echo Theme::asset()->container('player')->scripts(); ?>

<div class="video-detail">
    <div class="video-detail-close"></div>
    <div id="video-detail-con">
        <div class="video-close"></div>
        <div id="playerBox">
            <div id='player'></div>
            <div class="des">这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍</div>
        </div>

    </div>

</div>
<script>
    $(function() {
        $(".video-detail .video-detail-close,#video-detail-con .video-close").on("click",function(){
            $(".video-detail").fadeOut(200)
        })
        $(".page-news-video").on("click",function(){
            var vid = $(this).attr("vid");
            var des = $(this).attr("des");
            $("#player").html("")
            $(".video-detail").fadeIn(200)
            var width = document.getElementById("playerBox").scrollWidth;
            var height = width*0.5625; // 16/9 = 0.5625;
            var player = polyvPlayer({
                wrap: '#player',
                autoplay:false,
                'width':width,
                'height':height,
                'vid' : vid
            });
            $("#playerBox .des").text(des)
        })

    })
</script>
