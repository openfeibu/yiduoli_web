<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('product_category')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* 上级</label>

                        <div class="layui-input-block">
                            <select name="parent_id" id="parent_id" lay-filter="parent_id">
                                <option value="0">顶级</option>
                                <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat['id']); ?>"><?php echo $cat['name']; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>

                    <!--
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">批量标志</label>

                        <div class="layui-input-block">
                            <input type="checkbox" name="split[/]" title="/" checked>
                        </div>
                        <div class="layui-form-mid layui-word-aux">不勾选该字段，批量换行</div>
                    </div>
                    -->
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* <?php echo e(trans('product_category.label.name')); ?></label>
                        <div class="layui-input-block">
                            <textarea name="categories" placeholder="" class="layui-textarea"></textarea>
                        </div>

                        <div class="layui-form-mid layui-word-aux">批量（/或换行）</div>
                    </div>
                    <!--
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('product_category.label.en_name')); ?></label>
                        <div class="layui-input-block">
                            <textarea name="en_categories" placeholder="" class="layui-textarea"></textarea>
                        </div>

                        <div class="layui-form-mid layui-word-aux">批量（/或换行）</div>
                    </div>
                    -->
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="demo1"><?php echo e(trans('app.submit_now')); ?></button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    layui.use(['jquery','element'], function() {
        var form = layui.form;
        var $ = layui.$;

        $(document).ready(function(){
            $("#parent_id").val("<?php echo e($parent_id); ?>");
            form.render('select','parent_id');
        })

    })
</script>