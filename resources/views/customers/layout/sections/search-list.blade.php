@if (!$categories->isEmpty())
    <li><b>Categories</b></li>
    @foreach ($categories as $category)
        <li class = "header-search"><a href = "#">{{ $category->name }}</a></li>
    @endforeach
    <li class="divider"></li>
@endif

@if (!$brands->isEmpty())
    <li><b>Brands</b></li>
        @foreach ($brands as $brand)
            <li class = "header-search"><a href = "#">{{ $brand->name }}</a></li>
        @endforeach
    <li class="divider"></li>
@endif

@if (!$products->isEmpty())
    <li><b>Products</b></li>
    <li>
        @foreach ($products as $product)
            <li class = "header-search">
                <img src = "{{ $product->image }}" title = "{{ $product->name }}">
                <a href = "#">{{ $product->name }}</a>
            </li>
        @endforeach
    </li>
@endif
