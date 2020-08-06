<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{ url('/admin/subsidiary/create') }}">{{ trans('app.add') }}</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">{{ trans('app.delete') }}</button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">{{ trans('app.edit') }}</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">{{ trans('app.delete') }}</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="/image/original@{{d.image}}" alt="" height="28">
</script>
<script>
    var main_url = "{{guard_url('subsidiary')}}";
    var delete_all_url = "{{guard_url('subsidiary/destroyAll')}}";
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        table.render({
            elem: '#fb-table'
            ,url: '{{guard_url('subsidiary')}}'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'name',title:'{{ trans('subsidiary.label.name') }}', edit:'text'}
                ,{field:'image',title:'{{ trans('app.image') }}', width:200,toolbar:'#imageTEM',}
                ,{field:'url',title:'{{ trans('app.url') }}',templet:'<div><a href="@{{ d.url }}" target="_blank">@{{ d.url }}</a></div>'}
                ,{field:'order',title:'{{ trans('app.order') }}', sort: true}
                ,{field:'score',title:'{{ trans('app.actions') }}', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,height: 'full-200'
            ,page:false
        });
    });
</script>
{!! Theme::partial('common_handle_js') !!}