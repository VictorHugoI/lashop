@foreach($result as $item)
<li name="product" style="border: 1px solid #aeb6c5;padding-bottom: 5px;width: 100%;margin-bottom: 3px;" data-productId = "{{ $item->id }}" class="product" >
    <a href="{{ action('User\ProductController@show', [$item->id]) }}">
        <span class="image" style="float: right">
            <img src="{{ url($item->url) }}" alt="Profile Image"
                 style="width: 21%"/>
        </span>
        <span style="margin-left: 170px">
            <span style="color: #ad0800; font-size: 15px; font-weight: 800">
                {{ $item->name }}
            </span><br>
            @if($item->price_sale != null)
                <span class="price" style="margin-left: 170px; color: #f79606; font-weight: 500">{{ $item->price_sale }}</span>
                <p class="old-price">
                    <span class="price-sep">-</span>
                    <span class="price">{{ $item->price }}</span><br>
                </p>
            @else
                <span class="price" style="margin-left: 170px; color: #f79606; font-weight: 500">{{ $item->price }}</span><br>
            @endif
            <span class="time" style="margin-left: 170px">Brand: {{ $item->brand->name }}</span><br>
            <span class="time" style="margin-left: 170px;">Vintage: {{ $item->vintage }}</span>
        </span>
    </a>
</li>
@endforeach

<li style="border-bottom: 5px solid #ad0800;width: 100%;text-align: center" id="totalproduct123">
    <a>
        <span style="color: #ad0800; font-size: 15px; font-weight: 400; font-style: italic ">Has {{ $qty }} item in search</span><br>
    </a>
</li>
