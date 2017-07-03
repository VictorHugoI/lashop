@foreach($products as $product)
    <li>
        <div class="dropdown-messages-box">
            <a class="pull-left" style="padding: 3px 15px">
                <img alt="image" class="img-circle" src="{{ url('assets/images/products-images/product6.jpg') }}">
            </a>
            <div class="media-body">
                <strong>{{ $product->name }}</strong> <br>
                <small class="text-muted">Brand: </small>
                <small>Samsung</small>
            </div>
        </div>
    </li>
    <li class="divider" style="margin-top: 15px"></li>
@endforeach
    <li>
        <div class="text-center link-block">
            <a>
                <small>We're found </small> <strong>{{ $number }}</strong> <small> product!</small>
            </a>
        </div>
    </li>
