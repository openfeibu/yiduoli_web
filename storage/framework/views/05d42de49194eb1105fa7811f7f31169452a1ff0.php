<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="<?php echo e(guard_url('course/enterprise_honor/create')); ?>"><?php echo e(trans('app.add')); ?></a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del"><?php echo e(trans('app.delete')); ?></button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit"><?php echo e(trans('app.edit')); ?></a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><?php echo e(trans('app.delete')); ?></a>
</script>
<script type="text/html" id="imageTEM">
    <img src="{{d.image}}" alt="" height="28">
</script>

<script>
    var main_url = "<?php echo e(guard_url('course/enterprise_honor')); ?>";
    var delete_all_url = "<?php echo e(guard_url('course/enterprise_honor/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'year',title:'<?php echo e(trans('app.year')); ?>', width:120,edit:'title'}
                ,{field:'month',title:'<?php echo e(trans('app.month')); ?>', width:120,edit:'title'}
                ,{field:'description',title:'<?php echo e(trans('app.description')); ?>',edit:'title'}
                ,{field:'score',title:'操作', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: false
            ,limit: 10
            ,height: 'full-200'
        });


    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>