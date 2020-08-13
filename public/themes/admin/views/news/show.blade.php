<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('news/'.$page->id)}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('page.label.title') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('page.label.title') }}" class="layui-input" value="{{$page->title}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('page.label.image') }}</label>
                        {!! $page->files('image')
                        ->url($page->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="请输入{{ trans('app.description') }}" class="layui-textarea layui-block-textarea">{{$page->description}}</textarea>
                        </div>
                    </div>
					
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{ trans('app.content') }}</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="height:240px;">
                                {!! $page->content !!}
                            </script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.home_recommend') }}</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="home_recommend"  lay-filter="home_recommend" lay-skin="switch" lay-text="是|否" value="1" @if($page->home_recommend)  checked @endif>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.hot_recommend') }}</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="hot_recommend" lay-filter="hot_recommend" lay-skin="switch" lay-text="是|否" value="1" @if($page->hot_recommend) checked  @endif >
                        </div>
                    </div>

                    <div class="layui-form-item button-group">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button>
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
    layui.use(['form','jquery'], function(){
        var form = layui.form;
        var $ = layui.$;

    });
</script>