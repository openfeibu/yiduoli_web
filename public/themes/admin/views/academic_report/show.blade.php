<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('academic_report/'.$academic_report->id)}}" method="POST" lay-filter="fb-form">
                    <input type="hidden" name="product_id" value="{{ $academic_report->product_id }}">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{!! trans('app.title')!!}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入{!! trans('app.title')!!}" class="layui-input" value="{{ $academic_report->title }}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.file') }}</label>
                        {!! $academic_report->files('file')
                        ->url($academic_report->getFileURL('file'))
                        ->exts('pdf')
                        ->uploaderFile()!!}
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();

    layui.use(['form','jquery'], function(){
        var form = layui.form;
        form.render();
        var $ = layui.$;

    });

</script>

