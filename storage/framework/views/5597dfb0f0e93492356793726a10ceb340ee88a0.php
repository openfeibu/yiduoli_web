<div class="pageBanner newsBanner">
    <div class="pageBanner-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s"><div class="pageBanner-title-c"><span>走进溢多利</span></div></div>
    <div class="pageBanner-en wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s"><span>About VTR</span></div>
</div>
<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab',['type' => 'show'])->render(); ?>

        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$page_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php if($page->id == $page_item->id): ?> active <?php endif; ?> transition500"><a href="<?php echo e(route('pc.profile.show',$page_item->id)); ?>"><?php echo e($page_item->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="news-detail-content pull-right nopadding">
                <div class="news-detail-article">
                   <?php echo $page->content; ?>

                </div>
            </div>

        </div>

    </div>
</div>