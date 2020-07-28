<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('page/joint_research_institutes')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans('page.label.title')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('page.label.title')); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('page.label.image')); ?></label>
                        <?php echo $page->files('image')
                        ->url($page->getUploadUrl('image'))
                        ->uploader(); ?>

                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('app.description')); ?></label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="请输入<?php echo e(trans('app.description')); ?>" class="layui-textarea"><?php echo e($page->description); ?></textarea>
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

<script>

    layui.use(['form','jquery'], function(){
        var form = layui.form;
        var $ = layui.$;

    });

</script>
