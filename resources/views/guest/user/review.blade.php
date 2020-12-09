@extends('layouts.guest_layout')

@section('content')
<div id="content" class="wrapper">
	<div class="grid">
		
		<section class="unit three-quarters">

			<div class="post">
			
				<header class="post-header">
					<h1 class="post-title">
						@if(Session::get('userId'))
							{{Session::get('userFullName')}}
						@endif
					</h1>
					<div class="breadcrumbs">
						<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i> 
						Đánh giá sản phẩm
					</div>
				</header>
				
				<div class="post-content">
					@if(isset($orders))
					<table class="shop_table cart">
						<thead>
							<tr>
								<th class="product-name" style="max-width:12px;"><span>#</span></th>
								<th class="product-name"><span>Hình ảnh</span></th>
								<th class="product-quantity"><span>Sản phẩm</span></th>
								<th class="product-subtotal"><span>Thao tác</span></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($orders as $order)
							<tr class="cart_table_item {{ (($i % 2) == 1) ? 'even' : 'odd' }}">
								<td class="product-name">
									<a href="javascript:;">{{$i}}</a>
								</td>
								<td class="product-quantity">
									<img src="{{ asset(parse_url_file($order->product->avatar)) }}" width="63" height="63" alt="{{$order->product->name}}" />
								</td>
								<td class="product-quantity" style="text-align:left;max-width:80px;">
									<a href="{{ route('get.product.detail', $order->product->slug.'-'.$order->product->id) }}">
										{{ $order->product->name ?? "[N\A]" }}
									</a>
								</td>
								<td class="product-subtotal">
									<?php
										$review = \DB::table('reviews')
											->where('user_id', Session::get('userId'))
											->where('product_id', $order->product_id)
											->first();
									?>
									@if($review)
										<a href="{{ route('guest.user.deleteReview', $review->id) }}" class="button">
											Xóa
										</a>
									@else
										<a href="{{ route('get.product.detail', $order->product->slug.'-'.$order->product->id) }}" class="button">
											Viết đánh giá
										</a>
									@endif
								</td>
							</tr>
							<?php $i++; ?>
							@endforeach
						</tbody>
					</table>
					@else
						<div style="text-align:center;color:blue;">Bạn chưa mua sản phẩm nào!</div>
					@endif
				</div>
			</div>
		</section>
		
		@include('guest.user._aside')
	</div>
</div>
@stop