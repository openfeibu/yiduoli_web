<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab')->render(); ?>


        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="company-announcement">
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="company-announcement-item clearfix">
                    <a class="clearfix" target="_black" href="<?php echo e('/image/original'.$page->file); ?>">
                        <p><?php echo e($page->title); ?></p>
                        <span>[<?php echo e($page->updated_at->format('Y-m-d')); ?>]</span>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
        <?php echo $pages->links('common.pagination'); ?>

    </div>
</div>