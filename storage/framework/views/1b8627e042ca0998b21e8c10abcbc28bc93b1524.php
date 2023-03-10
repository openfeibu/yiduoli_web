<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="<?php echo e(guard_url('admin_user/create')); ?>">添加<?php echo e(trans("admin_user.name")); ?></a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>
                <div class="layui-inline">
                    <input class="layui-input search_key" name="username" id="demoReload" placeholder="<?php echo trans('admin_user.label.username'); ?>" autocomplete="off">
                </div>
                <div class="layui-inline">
                    <input class="layui-input search_key" name="email" id="demoReload" placeholder="<?php echo trans('admin_user.label.email'); ?>" autocomplete="off">
                </div>
                <div class="layui-inline">
                    <button class="layui-btn" data-type="reload">搜索</button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>


<script>
    var main_url = "<?php echo e(guard_url('admin_user')); ?>";
    var delete_all_url = "<?php echo e(guard_url('admin_user/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('admin_user')); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'username',title:'<?php echo trans('admin_user.label.username'); ?>'}
                ,{field:'email',title:'<?php echo trans('admin_user.label.email'); ?>'}
                ,{field:'role_names',title:'<?php echo trans('admin_user.label.roles'); ?>'}
                ,{field:'score',title:'操作', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 20
            ,height: 'full-200'
        });


    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>