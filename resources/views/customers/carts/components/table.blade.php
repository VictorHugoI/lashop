<table class="data-table cart-table" id="shopping-cart-table">
    <colgroup>
        <col width="1">
        <col>
        <col width="1">
        <col width="1">
        <col width="1">
        <col width="1">
        <col width="1">
    </colgroup>
    <thead>
        <tr class="first last">
            <th rowspan="1">&nbsp;</th>
            <th rowspan="1"><span class="nobr">Products</span></th>
            <th rowspan="1"></th>
            <th colspan="1" class="a-center"><span class="nobr">Price</span></th>
            <th class="a-center" rowspan="1">QTY</th>
            <th colspan="1" class="a-center">Subtotal</th>
            <th class="a-center" rowspan="1">&nbsp;</th>
        </tr>
    </thead>
    <tfoot>
        <tr class="first last">
            <td class="a-right last" colspan="50">
                <a href="{{ action('Customer\HomeController@index') }}" onclick="setLocation('#')" class="button btn-continue" title="Continue Shopping" type="button">
                <span><span>Continue Shoping</span></span>
                </a>
                @if (Cart::count())
                    <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit">
                    <span><span>Update Cart</span></span>
                    </button>
                    {!! Form::open(['action' => 'Customer\CartController@destroy', 'method' => 'POST', 'id' => 'empty']) !!}
                    <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit">
                        <span><span>Clear Cart</span></span>
                    </button>
                    {!! Form::close() !!}
                @endif
            </td>
        </tr>
    </tfoot>
    <tbody id="cartContent">
        @foreach(Cart::content() as $key => $item)
        <tr class="first odd cartItem">
            <td class="image"><a class="product-image" title="Sample Product" href="#/women-s-crepe-printed-black/">
                <img width="75" alt="Sample Product" src="{{$item['image']}}"></a>
            </td>
            <td>
                <h2 class="product-name"> <a href="#/women-s-crepe-printed-black/">{{ $item['name'] }}</a> </h2>
            </td>
            {{-- button-update --}}
            <td class="a-center">
                <a title="Edit item parameters" class="edit-bnt">
                </a>
            </td>
            <td class="a-right"><span class="cart-price"> <span class="price">${{ $item['price'] }}.00</span> </span>
            </td>
            <td class="a-center movewishlist">
                {!! Form::open(['action' => ['Customer\CartController@update', $key], 'method' => 'PUT', 'class' => 'formEdit' ]) !!}
                <input maxlength="12" class="input-text qty" title="Qty" size="4" value="{{ $item['qty'] }}" name="qty">
                {!! Form::close() !!}
            </td>
            <td class="a-right movewishlist"><span class="cart-price"> <span class="price total">${{ number_format($item['price'] * $item['qty']) }}</span> </span>
            </td>
            <td class="a-center last">
                <a class="button remove-item" title="Remove item" data-url="{{ action('Customer\CartController@edit', $key) }}">
                <span><span>Remove item</span></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ Form::close() }}
