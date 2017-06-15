<li class="item even">
    <a class="product-image" href="#" title="Downloadable Product ">
        <img alt="Downloadable Product " src="{{ url($cartItem->options['url']) }}"
             width="80">
    </a>
    <div class="detail-item">
        <div class="product-details">

            <a title="Remove This Item" onClick=""
               class="glyphicon glyphicon-remove" data-url="{{ action('User\CartController@edit', $cartItem->rowId) }}">&nbsp;</a>

            <p class="product-name">
                <a href="#" title="Downloadable Product">{{ $cartItem->name }} </a>
            </p>
        </div>
        <div class="product-details-bottom">
            <span class="price">{{'$ ' . $cartItem->price . '.00'}}</span>
            <span class="title-desc">{{ trans('user/label.qty') }}</span>
            <strong>{{ $cartItem->qty }}</strong></div>
    </div>
</li>
