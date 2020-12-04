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
						Quản lý đơn hàng
					</div>
				</header>
				
				<div class="post-content">
					@if(isset($transactions))
					<table class="shop_table cart">
						<thead>
							<tr>
								<th class="product-name" style="max-width:12px;"><span>#</span></th>
								<th class="product-price" style="max-width:12px;"><span>Ngày mua</span></th>
								<th class="product-quantity"><span>Sản phẩm</span></th>
								<th class="product-subtotal" style="max-width:12px;"><span>Tổng tiền</span></th>
								<th class="product-thumbnail" style="max-width:12px;"><span>Trạng thái</span></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($transactions as $transaction)
							<tr class="cart_table_item {{ (($i % 2) == 1) ? 'even' : 'odd' }}">
								<td class="product-name">
									<a href="javascript:;">{{$transaction->id}}</a>
								</td>
								<td class="product-price">
									<span class="amount">{{ $transaction->created_at->format("d/m/Y") }}</span>
								</td>
								<td class="product-quantity" style="text-align:left;max-width:80px;">
									@foreach($orders as $order)
										@if($order->transaction_id == $transaction->id)
										<span class="amount">
											<strong>{{ $order->quantity }}</strong> x 
											{{ \Str::words($order->product->name, '5') ?? "[N\A]" }}
											<br />
										</span>
										@endif
									@endforeach
								</td>
								<td class="product-subtotal">
									<span class="amount">
										{{ number_format($transaction->total_money,0,',','.') }}  đ
									</span>
								</td>
								<td class="product-subtotal">
									<span class="amount">
										{{ $transaction->getStatus($transaction->status)['name'] }}
									</span>
								</td>
							</tr>
							<?php $i++; ?>
							@endforeach
						</tbody>
					</table>
					@else
						<div style="text-align:center;color:blue;">Bạn chưa có đơn hàng nào!</div>
					@endif
				</div>
			</div>
		</section>
		
		@include('guest.user._aside')
	</div>
</div>
@stop