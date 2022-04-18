<div class="min-nav wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
    <a href="/">首页</a>
    @foreach($breadcrumbs as $key => $breadcrumb)
        @if($breadcrumb['is_menu'])

        >
        @if($key+1 == $count)
            <span @if(isset($breadcrumb['class'])) class="{{$breadcrumb['class']}}" @endif>{{ $breadcrumb['name'] }}</span>
        @else
            <a @if($breadcrumb['url'])href="{{ $breadcrumb['url'] }}"@endif>{{ $breadcrumb['name'] }}</a>
        @endif

        @endif
    @endforeach
</div>
