<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('admin_user/'.$admin_user->id)); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans("admin_user.label.username")); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="username" value="<?php echo e($admin_user->username); ?>" lay-verify="required|username" autocomplete="off" placeholder="请输入<?php echo e(trans("admin_user.label.username")); ?>" class="layui-input" disabled>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("admin_user.label.email")); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" value="<?php echo e($admin_user->email); ?>"  autocomplete="off" placeholder="请输入<?php echo e(trans("admin_user.label.email")); ?>" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("admin_user.label.new_password")); ?></label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" lay-verify="pass" placeholder="请输入<?php echo e(trans("admin_user.label.password")); ?>，不改则留空" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请输入密码，不改则留空。密码必须6到15位，且不能出现空格</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans("admin_user.label.roles")); ?></label>
                        <div class="layui-input-block">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="radio" name="roles[]" value="<?php echo e($role->id); ?>" title="<?php echo e($role->name); ?>" <?php echo e(!($admin_user->hasRole($role->slug)) ? :'checked'); ?>>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    layui.use('form', function(){
        var form = layui.form;

        form.render();
        form.verify({
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
                    return '用户名不能有特殊字符';
                }
            }
            //我们既支持上述函数式的方式，也支持下述数组的形式
            //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
            ,pass: [
                /^[\S]{6,15}$/
                ,'密码必须6到15位，且不能出现空格'
            ]
        });
    });
</script>

