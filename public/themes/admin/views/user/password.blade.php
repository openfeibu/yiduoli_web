<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ guard_url('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>修改密码</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('password')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">旧密码</label>
                        <div class="layui-input-inline">
                            <input type="text" name="old_password" lay-verify="pass" autocomplete="off" placeholder="请输入旧密码" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">新密码</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" lay-verify="pass" autocomplete="off" placeholder="请输入新密码" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">确认新密码</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password_confirmation" lay-verify="pass" autocomplete="off" placeholder="请输入确认新密码" class="layui-input" value="">
                        </div>
                    </div>
                    {!!Form::token()!!}
                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button></div></div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    layui.use(['jquery','element','form','table','upload'], function(){
        var form = layui.form;
        var $ = layui.$;
        //监听提交
        /*
        form.on('submit(demo1)', function(data){
            data = JSON.stringify(data.field);
            data = JSON.parse(data);
            data['_token'] = "{!! csrf_token() !!}";
            var load = layer.load();
            $.ajax({
                url : "{{guard_url('password')}}",
                data :  data,
                type : 'POST',
                success : function (data) {
                    layer.close(load);
                    layer.msg('更新成功');
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    layer.msg('服务器出错');
                }
            });
            return false;
        });
        */
        form.verify({
            pass: [
                /^[\S]{6,12}$/
                ,'密码必须6到12位，且不能出现空格'
            ]
        });

    });
</script>