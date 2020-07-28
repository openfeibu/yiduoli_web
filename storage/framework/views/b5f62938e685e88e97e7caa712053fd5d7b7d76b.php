<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('admin_user')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans("admin_user.label.username")); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="username" value="<?php echo e($admin_user->username); ?>" lay-verify="required|username" autocomplete="off" placeholder="请输入<?php echo e(trans("admin_user.label.username")); ?>" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">用户名不能有特殊字符</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("admin_user.label.email")); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" value="<?php echo e($admin_user->email); ?>" autocomplete="off" placeholder="请输入<?php echo e(trans("admin_user.label.email")); ?>" class="layui-input" >
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans("admin_user.label.password")); ?></label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" placeholder="请输入<?php echo e(trans("admin_user.label.password")); ?>" autocomplete="off" class="layui-input" lay-verify="pass">
                        </div>
                        <div class="layui-form-mid layui-word-aux">密码必须6到15位，且不能出现空格</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans("admin_user.label.roles")); ?></label>
                        <div class="layui-input-block">
                            <?php $i=1 ?>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="radio" name="roles[]" value="<?php echo e($role->id); ?>" title="<?php echo e($role->name); ?>" <?php if($i == 1): ?> checked <?php endif; ?> >
                             <?php $i++ ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    layui.use(['jquery','element','table','laytpl'], function(){
        var table = layui.table;
        var form = layui.form;
        var laytpl = layui.laytpl;
        var $ = layui.$;
        var element = layui.element;
        form.render();
        form.verify({
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
//                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
//                    return '用户名不能有特殊字符';
//                }
                /*
                if(/(^\_)|(\__)|(\_+$)/.test(value)){
                    return '用户名首尾不能出现下划线\'_\'';
                }
                */
                var ajax_data = {};
                ajax_data['_token'] = "<?php echo csrf_token(); ?>";
                ajax_data['username'] = value;
                var load = layer.load();
                var message = '';
                $.ajax({
                    url : "<?php echo e(guard_url('admin_user/validate')); ?>",
                    data : ajax_data,
                    type : 'post',
                    async:false,
                    success : function (data) {
                        layer.close(load);
                        if(data.code !=0 || data.code !=200)
                        {
                            message = data.message;
                            return false;
                        }
                        return true;
                    },
                    error : function (jqXHR, textStatus, errorThrown) {
                        layer.close(load);
                        $.ajax_error(jqXHR, textStatus, errorThrown);
                        return false;
                    }
                });
               if(message)
               {
                   return message;
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

