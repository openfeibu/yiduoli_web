@if($nav) 当前位置：@if($parent_nav) <a href="{{ $parent_nav->url }}">{{ $parent_nav->name }}</a> > @endif {{ $nav->name }} @endif