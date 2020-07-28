<div class="main">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab')->render(); ?>

    </div>
    <div class="screen wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
        <div class="container w1400">
            <ul class="one-tab clearfix">
                <li class="active" category_id='0' type="parent">全部</li>
                <?php $__currentLoopData = $top_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li category_id="<?php echo e($category->id); ?>" type="child"><?php echo e($category->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <div class="main product-list">
        <?php echo $__env->make('product_information.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
</div>
<?php echo Theme::asset()->container('player')->scripts(); ?>

<div class="video-detail">
    <div class="video-detail-close"></div>
    <div id="video-detail-con">
        <div class="video-close"></div>
        <div id="playerBox">
            <div id='player'></div>
            <div class="des">这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍</div>
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
                url : "<?php echo e(route('pc.product_information')); ?>",
                data : {'page':page,'product_category_id' : category_id,'token':"<?php echo csrf_token(); ?>"},
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
                url : "<?php echo e(route('pc.product_information')); ?>",
                data : {'page':page,'product_category_id' : category_id,'token':"<?php echo csrf_token(); ?>"},
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
                url : "<?php echo e(route('pc.product_information')); ?>",
                data : {'page':page,'product_category_id' : category_id,'token':"<?php echo csrf_token(); ?>"},
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
                url : "<?php echo e(route('pc.product_information')); ?>",
                data : {'page':page,'product_category_id' : category_id,'token':"<?php echo csrf_token(); ?>"},
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
                data : {'product_category_id' : category_id,'token':"<?php echo csrf_token(); ?>"},
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
<script>
    $(function() {
        $(".video-detail .video-detail-close,#video-detail-con .video-close").on("click",function(){
            $(".video-detail").fadeOut(200);
            $("#player").html("")
        })
        $("body").on("click",'.video',function(){
            var vid = $(this).attr("vid");
            var des = $(this).attr("des");
            $("#player").html("")
            $(".video-detail").fadeIn(200)
            var width = document.getElementById("playerBox").scrollWidth;
            var height = width*0.5625; // 16/9 = 0.5625;
            var player = polyvPlayer({
                wrap: '#player',
                autoplay:false,
                'width':width,
                'height':height,
                'vid' : vid
            });
            $("#playerBox .des").text(des)
        })

    })
</script>