<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="<?php echo e(guard_url('academic_report/create').'?product_id='.$product_id); ?>"><?php echo e(trans('app.add')); ?></a></button>
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


<script>
    var main_url = "<?php echo e(guard_url('academic_report')); ?>";
    var delete_all_url = "<?php echo e(guard_url('academic_report/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('academic_report')); ?>?product_id=<?php echo e($product_id); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'title',title:'<?php echo trans('app.title'); ?>',edit:'text'}
                ,{field:'file',title:'<?php echo e(trans('app.file')); ?>',templet:"<div><a href='/image/original/{{ d.file }}' target='_blank'>{{ d.file }}</a></div>"}
                ,{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 20
            ,height: 'full-200'
        });


    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>