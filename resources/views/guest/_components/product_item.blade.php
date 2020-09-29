<div class="col-md-4 product-men mt-5">
	<div class="men-pro-item simpleCart_shelfItem">
		<div class="men-thumb-item text-center">
			<a href="{{ route('get.product.detail', $product->slug.'-'.$product->id) }}">
				<img src="{{ asset(parse_url_file($product->avatar)) }}" width="190" height="210" alt="{{$product->name}}">
			</a>
			@if($product->sale)
				<span class="product-new-top">-{{$product->sale}}%</span>
			@endif
		</div>
		<div class="item-info-product text-center border-top mt-4">
			<h4 class="pt-1">
				<a href="{{ route('get.product.detail', $product->slug.'-'.$product->id) }}">{{$product->name}}</a>
			</h4>
			<div class="info-product-price my-2">
				<span class="item_price">{{number_format($product->price,0,',','.')}} đ</span>
				@if($product->sale)
					<del>{{number_format($product->price_old,0,',','.')}} đ</del>
				@endif
			</div>
			<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
				<div class="checkout-right-basket">
					<a href="{{route('get.cart.add', $product->id)}}">
						Chọn mua
						<span class="fas fa-cart-arrow-down"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>