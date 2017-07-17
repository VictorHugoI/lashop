<table class="data-table cart-table" id="shopping-cart-table">
    <caption class="text-center">ORDER DETAILS</caption>
    <thead>
    <tr class="first last">
        <th><span class="nobr">Products</span></th>
        <th></th>
        <th class="a-center"><span class="nobr">Price</span></th>
        <th class="a-center">QTY</th>
        <th class="a-center">Subtotal</th>
    </tr>
    </thead>
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
            <td class="a-right"><span class="cart-price"> <span class="price">${{ $item['price'] }}.00</span> </span>
            </td>
            <td class="a-center movewishlist">
                {{ $item['qty'] }}
            </td>
            <td class="a-right movewishlist"><span class="cart-price"> <span class="price total">${{ number_format($item['price'] * $item['qty']) }}</span> </span>
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4" class=""><b>Subtotal</b></td>
        <td>{{ '$' . number_format(Cart::subtotal()) }}</td>
    </tr>
    </tbody>
</table>



