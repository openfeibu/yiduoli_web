<div class="report-list clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
    <div class="container w1400">
        @foreach($products as $key => $product)
        <div class="report-item">

            <div class="report-item-type">{{ $product->title }}</div>
            <ul class="report-item-box clearfix">
                @foreach($product->academic_reports as $key => $academic_report)
                    <li class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <a href="{{ '/image/original'.$academic_report->file }}" target="_blank">
                            <div class="report-bg transition500">
                                <div class="test fb-overflow-2">{{ $academic_report->title }}</div>
                                <div class="date">{{ $academic_report->created_at->format("y-m-d") }}</div>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
        @endforeach

    </div>
</div>
{!! $products->links('common.ajax_pagination') !!}