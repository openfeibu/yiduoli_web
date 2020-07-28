<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('course/awards_honor')}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.date') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="date" class="layui-input" id="date" value="{{ date('Y-m') }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-block">
                            <textarea name="description"  placeholder="请输入{{ trans('app.description') }}"  class="layui-textarea"></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        laydate.render({
            elem: '#date' //指定元素,
            ,type:'month'
            ,value: '{{ date('Y-m') }}'
        });
    });
</script>