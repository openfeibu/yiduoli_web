<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab')->render(); ?>

    </div>

    <div class="main">
        <div class="report-list clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <div class="container w1400">
                <div class="report-item">
                    <div class="report-item-type"><?php echo e($product->title); ?></div>
                    <ul class="report-item-box clearfix">
                        <?php $__currentLoopData = $academic_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $academic_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                            <a href="<?php echo e('/image/original'.$academic_report->file); ?>" target="_blank">
                                <div class="report-bg transition500">
                                    <div class="test fb-overflow-2"><?php echo e($academic_report->title); ?></div>
                                    <div class="date"><?php echo e($academic_report->updated_at->format("y-m-d")); ?></div>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>