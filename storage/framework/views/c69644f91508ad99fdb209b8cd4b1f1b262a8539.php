<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('nav/nav')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('nav_category.name')); ?></label>
                        <div class="layui-input-block">
                            <?php $i=1;?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="radio" name="category_id" value="<?php echo e($category['id']); ?>" title="<?php echo e($category['name']); ?>" <?php if($i==1): ?> checked <?php endif; ?>>
                                <?php $i++;?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!--
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* 上级</label>
                        <div class="layui-input-inline">
                            <input type="text" name="parent_id" id="parent_tree" lay-verify="tree" autocomplete="off" placeholder="请选择上级" class="layui-input">
                        </div>
                    </div>
                    -->
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans('nav.label.name')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('nav.label.name')); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans('nav.label.en_name')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="en_name" autocomplete="off" placeholder="请输入<?php echo e(trans('nav.label.en_name')); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('nav.label.slug')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="slug" autocomplete="off" placeholder="请输入<?php echo e(trans('nav.label.slug')); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans('nav.label.url')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="url" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('nav.label.url')); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('nav.label.image')); ?></label>
                        <?php echo $nav->files('image')
                        ->url($nav->getUploadUrl('image'))
                        ->uploader(); ?>

                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.order')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" value="0" autocomplete="off" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1"><?php echo e(trans('app.submit_now')); ?></button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                </form>
            </div>

        </div>
    </div>
</div>
