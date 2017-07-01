@foreach ($cartContent as $product)
	<li class="item even">
	    <a class="product-image" href="#" title="Downloadable Product ">{!! Html::image($product['image'], null, ['width' => 80], null) !!}
	    <div class="detail-item">
	        <div class="product-details">
	            <a href="#" title="Remove This Item" onClick="" class="glyphicon glyphicon-remove">&nbsp;</a> <a class="glyphicon glyphicon-pencil" title="Edit item" href="#">&nbsp;</a>
	            <p class="product-name"> <a href="#" title="Downloadable Product">{{ $product['name'] }}</a> </p>
	        </div>
	        <div class="product-details-bottom"> <span class="price">{{ '$' . $product['price'] }}</span> <span class="title-desc">Qty:</span> <strong>{{ $product['qty'] }}</strong> </div>
	    </div>
	</li>
@endforeach