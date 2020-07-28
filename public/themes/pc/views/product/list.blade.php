<div class="page-product-con clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
    @foreach($products as $key => $product)
        <div class="page-product-item clearfix col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <a href="{{ route('pc.product.show',$product->id) }}">
                <div class="img "><img class="transition500" src="{{ '/image/original'.$product->image }}" alt=" {{ $product->title }}"></div>
                <div class="test transition">

                    <div class="title fb-overflow-1">
                        {{ $product->title }}
                    </div>

                </div>
            </a>
        </div>
    @endforeach
</div>
{!! $products->links('common.ajax_pagination') !!}