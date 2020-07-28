<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('academic_report/'.$academic_report->id)); ?>" method="POST" lay-filter="fb-form">
                    <input type="hidden" name="product_id" value="<?php echo e($academic_report->product_id); ?>">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo trans('app.title'); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo trans('app.title'); ?>" class="layui-input" value="<?php echo e($academic_report->title); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.file')); ?></label>
                        <?php echo $academic_report->files('file')
                        ->url($academic_report->getFileURL('file'))
                        ->exts('pdf')
                        ->uploaderFile(); ?>

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
<?php echo Theme::asset()->container('ueditor')->scripts(); ?>

<script>
    var ue = getUe();

    layui.use(['form','jquery'], function(){
        var form = layui.form;
        form.render();
        var $ = layui.$;

    });

</script>

