
<!-- 内容 -->
<div class="main pageMain">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>


        <div class="news-detail clearfix">
            <div class="news-detail-title  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s"><?php echo e($news->title); ?></div>
            <div class="news-detail-left pull-left  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="news-detail-date"><?php echo e($news->updated_at->format('Y-m-d')); ?></div>
                <div class="news-detail-c">
                    <?php echo $news->content; ?>

                </div>
                <div class="news-page">
                    <?php if($previous): ?>
                    <div class="news-prev col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding">
                        <a href="<?php echo e(route('pc.news.show',$previous->id)); ?>">上一篇：<?php echo e(get_substr($previous->title,50)); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php if($next): ?>
                    <div class="news-next col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding">
                        <a href="<?php echo e(route('pc.news.show',$next->id)); ?>">下一篇：<?php echo e(get_substr($next->title,50)); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="news-detail-right pull-right  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="news-detail-right-t">新闻推荐</div>
                <div class="news-detail-right-c">
                    <?php $__currentLoopData = $hot_recommend_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="news-detail-right-c-item clearfix">
                        <a class="clearfix" href="<?php echo e(route('pc.news.show',$news_item->id)); ?>">
                            <div class="img"><img class="transition500" src="<?php echo e('/image/original'.$news_item->image); ?>" alt=""></div>
                            <div class="test">
                                <p class="fb-overflow-2"><?php echo e(get_substr($news_item->title,50)); ?></p>
                                <span><?php echo e($news_item->updated_at->format('Y-m-d')); ?></span>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
