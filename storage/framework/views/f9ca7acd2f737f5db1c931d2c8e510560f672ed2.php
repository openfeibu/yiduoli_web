<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">

            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="<?php echo e(guard_url('profile/create')); ?>"><?php echo e(trans('app.add')); ?></a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del"><?php echo e(trans('app.delete')); ?></button>
                </div>
                <div class="layui-inline">
                    <input class="layui-input search_key" name="title" id="demoReload" placeholder="<?php echo e(trans('app.search')); ?><?php echo e(trans('page.label.title')); ?>" autocomplete="off">
                </div>
                <div class="layui-inline">
                    <button class="layui-btn" data-type="reload"><?php echo e(trans('app.search')); ?></button>
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
    var main_url = "<?php echo e(guard_url('page/profile')); ?>";
    var delete_all_url = "<?php echo e(guard_url('page/profile/destroyAll')); ?>";
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
                ,{field:'title',title:'<?php echo e(trans('page.label.title')); ?>',edit:'text' , width:280}
                ,{field:'slug',title:'<?php echo e(trans('page.label.slug')); ?>',edit:'text' }
                ,{field:'order',title:'排序', width:80, sort: true,edit:'text'}
                ,{field:'updated_at',title:'<?php echo e(trans('app.updated_at')); ?>', width:250}
                ,{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:200, align: 'right',fixed: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 20
            ,height: 'full-200'
            ,cellMinWidth:200
            ,error: function(e,t){
                console.log(e);
                $.ajax_table_error(e);
            }
        });

    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>