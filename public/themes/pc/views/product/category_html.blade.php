<div class="container w1400">
@foreach($lists as $list_key => $list)
    <ul class="{!! num_to_eng_tab($list_key) !!} clearfix category-tab" style="display: block">
        @foreach($list as $key => $category)
            @if($category['id'] == 57)
                <li category_id="{{ $category['id'] }}" type="child" @if($category['active']) class="active" @endif><a href="{{ setting('gym_website') }}" target="_blank">{{ $category['name'] }}</a></li>
            @else
                <li category_id="{{ $category['id'] }}" type="child" @if($category['active']) class="active" @endif>{{ $category['name'] }}</li>
            @endif
        @endforeach
    </ul>
@endforeach
</div>