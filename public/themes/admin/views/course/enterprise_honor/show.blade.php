<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('course/enterprise_honor/'.$course->id)}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.date') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="date" class="layui-input" id="date" value="{{ $course->year }}-{{ $course->month }}">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="description" style="height:240px;">{!! $course->content !!}</script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        laydate.render({
            elem: '#date' //指定元素,
            ,type:'month'
        });
    });
</script>