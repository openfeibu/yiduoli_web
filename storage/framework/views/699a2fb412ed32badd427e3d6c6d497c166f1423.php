<div class="min-nav wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
    <a href="/">首页</a>
    <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($breadcrumb->is_menu): ?>

        >
        <?php if($key+1 == $count): ?>
            <?php echo e($breadcrumb->name); ?>

        <?php else: ?>
            <a <?php if($breadcrumb->url): ?>href="<?php echo e($breadcrumb->url); ?>"<?php endif; ?>><?php echo e($breadcrumb->name); ?></a>
        <?php endif; ?>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
