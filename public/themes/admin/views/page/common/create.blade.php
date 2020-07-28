<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{ $url.'/store' }}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{  trans('app.title') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('app.title') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="请输入{{ trans('app.description') }}" class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{  trans('app.content') }}</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="height:240px;">

                            </script>
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
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();
</script>