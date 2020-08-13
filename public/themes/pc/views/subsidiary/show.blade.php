
<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTabShow')->render() !!}
        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    @foreach($top_subsidiaries as $key =>$top_subsidiary)
                        <li class="@if($subsidiary->id == $top_subsidiary->id) active @endif transition500"><a href="{{ route('pc.subsidiary.show',$top_subsidiary->id)  }}">{{ $top_subsidiary->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="news-detail-content pull-right nopadding">
                <div class="news-detail-article">
                    <div class="subsidiary-title">{!! $subsidiary->name !!}</div>
                    {!! $subsidiary->content !!}
                </div>
                <ul>

                @foreach($children_subsidiaries as $key =>$children_subsidiary)
                    <li class="transition500"><a href="{{ route('pc.subsidiary.show',$children_subsidiary->id)  }}">{{ $children_subsidiary->name }}</a></li>
                @endforeach
                </ul>

            </div>

        </div>

    </div>
</div>