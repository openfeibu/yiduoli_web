
<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab')->render() !!}
        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    @foreach($pages as $key =>$page_item)
                    <li class="@if($page->id == $page_item->id) active @endif transition500"><a href="{{ route('pc.'.$route_slug.'.show',$page_item->id)  }}">{{ $page_item->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="news-detail-content pull-right nopadding">
                <div class="news-detail-article">
                   {!! $page->content !!}
                </div>
            </div>

        </div>

    </div>
</div>