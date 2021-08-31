<script>
    $(function() {
        //商品筛选
        var page = 1;
        category_id = {{ $product_category_id  }};

        var  tab_num_arr = {'1':'one','2':'two' ,'3':'three','4':'four','5':'five'};
        $("body").on("click",".screen .category-tab li", function () {
            category_id = $(this).attr('category_id');
            if(category_id==57)
            {
                return true;
            }else{
                var type = $(this).attr('type');
                var that = $(this);
                var this_index = $(".screen ul").index($(this).parent());
                showLoading();
                $(this).addClass("active").siblings("li").removeClass("active");
                $.ajax({
                    url : url,
                    data : {'page':page,'product_category_id' : category_id,'search_key':"{{ $search_key }}",'_token':"{!! csrf_token() !!}"},
                    type : 'get',
                    dataType : "json",
                    success : function (data) {
                        var html = data.data.content;
                        hideLoading();
                        if(html)
                        {
                            $(".product-list").html(html);
                        }
                        $(".screen ul").each(function(index,el){
                            console.log(index)
                            if(index > this_index)
                            {
                                $(this).fadeOut(200).remove();
                            }
                        });

                        $("#category_html").html(data.data.category_html);
                        $(".top_product_category_name").html(data.data.top_product_category_name);
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
            }
        })

    })

</script>