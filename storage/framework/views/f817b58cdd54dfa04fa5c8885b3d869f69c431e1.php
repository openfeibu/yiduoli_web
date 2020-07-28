<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('page/talent_system')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans('page.label.title')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('page.label.title')); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans('page.label.slug')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="slug" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('page.label.slug')); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('app.content')); ?></label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="height:240px;">

                            </script>
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
<?php echo Theme::asset()->container('ueditor')->scripts(); ?>

<script>
    var ue = getUe();

    layui.use(['form','jquery'], function(){
        var form = layui.form;
        var $ = layui.$;

    });

</script>
