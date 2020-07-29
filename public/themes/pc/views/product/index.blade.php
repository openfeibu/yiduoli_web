<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        <div class="screen wow fadeInUp animated " style="box-shadow: none;" data-wow-duration=".6s" data-wow-delay=".5s">
            <ul class="one-tab clearfix">
                <li class="active" category_id='0' type="parent">全部</li>
                @foreach($top_categories as $key => $category)
                <li category_id="{{ $category->id }}" type="child">{{ $category->name }}</li>
                @endforeach
            </ul>
            <ul class="two-tab clearfix">
                <li>全部</li>
                <li>饲料用酶制剂</li>
                <li>医药用酶制剂</li>
                <li>食品用酶制剂</li>
                <li>能源用酶制剂</li>
                <li>造纸用酶制剂</li>
            </ul>
            <ul class="three-tab clearfix">
                <li>全部</li>
                <li>溢多利饲用复合酶</li>
                <li>鸿鹰生物饲用复合酶</li>
                <li>食品用酶制剂</li>
                <li>能源用酶制剂</li>
                <li>造纸用酶制剂</li>
            </ul>
            <ul class="four-tab clearfix">
                <li>全部</li>
                <li>8系列产品</li>
                <li>A系列产品</li>
                <li>C系列产品</li>
                <li>P系列产品</li>
                <li>NS系列产品</li>
                <li>麦酶宝系列产品</li>
                <li>L系列产品</li>
            </ul>
        </div>
    </div>
    <div class="product-main">
        <div class="container w1400 product-list">
            @include('product.list')
        </div>
    </div>
</div>
<script>
    $(function() {
        //商品筛选
        var page = 1;
        var category_id = 0;
        $(".screen .one-tab li").on("click", function () {
            $(this).addClass("active").siblings("li").removeClass("active");
            category_id = $(this).attr('category_id');
            var type = $(this).attr('type');
            var that = $(this);
            $.ajax({
                url : "{{ route('pc.product.index') }}",
                data : {'page':page,'product_category_id' : category_id,'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    var html = data.data.content;
                    console.log(html);
                    if(html)
                    {
                        $(".product-list").html(html);
                    }
                    if(type == 'child')
                    {
                        if(data.data.categories.length > 0)
                        {
                            var category_tab_html = "<li category_id='"+category_id+"' type='parent' class='active'>全部</li>";
                            $.each(data.data.categories,function (i,item) {
                                category_tab_html += "<li category_id='"+item.id+"' type='child'>"+item.name+"</li>";
                            })

                            that.parent().next('ul').html(category_tab_html);
                            $(".screen .three-tab,.screen .four-tab").fadeOut(200);
                            $(".screen .two-tab").fadeIn();
                        }
                    }else{
                        $(".screen .two-tab,.screen .three-tab,.screen .four-tab").fadeOut(200);
                    }

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                }
            });
        })
        $(".screen").on("click", ".two-tab li", function () {
            $(this).addClass("active").siblings("li").removeClass("active");
            category_id = $(this).attr('category_id');
            var type = $(this).attr('type');
            var that = $(this);
            $.ajax({
                url : "{{ route('pc.product.index') }}",
                data : {'page':page,'product_category_id' : category_id,'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    var html = data.data.content;
                    console.log(html);
                    if(html)
                    {
                        $(".product-list").html(html);
                    }
                    if(type == 'child')
                    {
                        if(data.data.categories.length > 0)
                        {
                            var category_tab_html = "<li category_id='"+category_id+"' type='parent' class='active'>全部</li>";
                            $.each(data.data.categories,function (i,item) {
                                category_tab_html += "<li category_id='"+item.id+"' type='child'>"+item.name+"</li>";
                            })

                            that.parent().next('ul').html(category_tab_html);
                            $(".screen .four-tab").fadeOut(200);
                            $(".screen .three-tab").fadeIn();
                        }
                    }else{
                        $(".screen .three-tab,.screen .four-tab").fadeOut(200);
                    }

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                }
            });
        })
        $(".screen").on("click", ".three-tab li", function () {
            $(this).addClass("active").siblings("li").removeClass("active");
            category_id = $(this).attr('category_id');
            var type = $(this).attr('type');
            var that = $(this);
            $.ajax({
                url : "{{ route('pc.product.index') }}",
                data : {'page':page,'product_category_id' : category_id,'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    var html = data.data.content;
                    console.log(html);
                    if(html)
                    {
                        $(".product-list").html(html);
                    }
                    if(type == 'child')
                    {
                        if(data.data.categories.length > 0)
                        {
                            var category_tab_html = "<li category_id='"+category_id+"' type='parent' class='active'>全部</li>";
                            $.each(data.data.categories,function (i,item) {
                                category_tab_html += "<li category_id='"+item.id+"' type='child'>"+item.name+"</li>";
                            })

                            that.parent().next('ul').html(category_tab_html);
                            $(".screen .four-tab").fadeIn();
                        }
                    }else{
                        $(".screen .four-tab").fadeOut(200);
                    }

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                }
            });
        })
        $(".screen").on("click", ".four-tab li", function () {
            $(this).addClass("active").siblings("li").removeClass("active");
            category_id = $(this).attr('category_id');
            var type = $(this).attr('type');
            var that = $(this);
            $.ajax({
                url : "{{ route('pc.product.index') }}",
                data : {'page':page,'product_category_id' : category_id,'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    var html = data.data.content;
                    console.log(html);
                    if(html)
                    {
                        $(".product-list").html(html);
                    }

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                }
            });
        })
        $("body").on("click", ".page a", function () {
            var ajax_href= $(this).attr('ajax_href');
            if(!ajax_href || ajax_href == 'javascript' || ajax_href == '#')
            {
                return ;
            }
            $.ajax({
                url : ajax_href,
                data : {'product_category_id' : category_id,'_token':"{!! csrf_token() !!}"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    var html = data.data.content;
                    console.log(html);
                    if(html)
                    {
                        $(".product-list").html(html);
                    }

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                }
            });
        })
    })

</script>