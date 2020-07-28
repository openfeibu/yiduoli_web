<div class="report-list clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
    <div class="container w1400">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="report-item">
            <div class="report-item-type"><?php echo e($product->title); ?></div>
            <ul class="report-item-box clearfix">
                <?php if($product->vid): ?>
                <li class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                    <div class="report-bg transition500 video" vid = "<?php echo e($product->vid); ?>" des="<?php echo e($product->description); ?>">
                        <div class="test fb-overflow-2"><?php echo e($product->title); ?></div>
                        <div class="date"><?php echo e($product->updated_at->format('Y-m-d')); ?></div>
                    </div>

                </li>
                <?php endif; ?>
                <?php if($product->instruction): ?>
                <li class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <a href="<?php echo e('/image/original/'.$product->instruction); ?>" target="_blank">
                        <div class="report-bg transition500">
                            <div class="test fb-overflow-2"><?php echo e($product->instruction_title); ?></div>
                            <div class="date"><?php echo e($product->updated_at->format('Y-m-d')); ?></div>
                        </div>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php echo $products->links('common.ajax_pagination'); ?>