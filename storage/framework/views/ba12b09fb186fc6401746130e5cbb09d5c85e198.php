<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <div class="layui-col-md12">
            <?php echo Theme::partial('message'); ?>

            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('course/development_course')); ?>" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.date')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="year" class="layui-input" id="year" value="<?php echo e(date('Y')); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.description')); ?></label>
                        <div class="layui-input-block">
                            <textarea name="description"  placeholder="请输入<?php echo e(trans('app.description')); ?>"  class="layui-textarea"></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        laydate.render({
            elem: '#year' //指定元素,
            ,type:'year'
            ,value: '<?php echo e(date('Y')); ?>'
        });
    });
</script>