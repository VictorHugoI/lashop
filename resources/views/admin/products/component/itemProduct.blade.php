@foreach($products as $product)
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation">

                    <img src="{{ url('assets/images/products-images/product6.jpg') }}" style="width: 287px; height: 200px">

                </div>
                <div class="product-desc">
                    <span class="product-price">
                        ${{ $product->price }}
                    </span>
                    <small class="text-muted">Category</small>
                    <a class="product-name"> {{ $product->name }}</a>
                    <div class="m-t text-righ">
                        @if($product->productProperties->count())
                            <a class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                        @else
                            <a class="btn btn-xs btn-outline btn-danger">None property  </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
