
<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab')->render(); ?>

        <div class="news-con clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">

            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $news_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key == 0 && Request::get('page','1') == 1 && $news_item->hot_recommend): ?>
                    <div class="page-news-big-item clearfix col-lg-12 col-md-12 col-sm-12">
                        <a href="<?php echo e(route('pc.news.show',$news_item->id)); ?>" class="clearfix">
                            <div class="img pull-left"><img class="transition500" src="<?php echo e('/image/original'.$news_item->image); ?>" alt=""></div>
                            <div class="test">
                                <div class="title transition500"> <?php echo e($news_item->title); ?></div>
                                <div class="date"><?php echo e($news_item->updated_at->format('Y-m-d')); ?></div>
                                <div class="con fb-overflow-3"><?php echo e($news_item->description); ?></div>
                                <div class="btn">了解更多</div>
                            </div>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="page-news-item clearfix col-lg-11 col-md-11 col-sm-12 col-xs-12">
                        <a href="<?php echo e(route('pc.news.show',$news_item->id)); ?>" class="clearfix">
                            <div class="img "><img class="transition500" src="<?php echo e('/image/original'.$news_item->image); ?>" alt=""></div>
                            <div class="test">
                                <div class="title transition500 fb-overflow-2">
                                    <?php echo e($news_item->title); ?>

                                </div>
                                <div class="date"><?php echo e($news_item->updated_at->format('Y-m-d')); ?></div>

                                <div class="con fb-overflow-2"><?php echo e($news_item->description); ?></div>
                                <div class="btn">了解更多</div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </div>
        <?php echo $news->links('common.pagination'); ?>



    </div>
</div>
