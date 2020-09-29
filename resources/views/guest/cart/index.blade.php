@extends('layouts.guest_layout')

@section('content')
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
<div id="content" class="wrapper">
	<div class="grid">
		<!-- Phần nội dung bên trái 3/4 -->
		<section class="unit">
			<div class="post">
				<!-- Tên tiêu đề và Đường dẫn -->
				<header class="post-header">
					<h1 class="post-title">Giỏ hàng của bạn</h1><span> {{\Cart::count()}} sản phẩm</span>
					<div class="breadcrumbs">
						<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i> 
						Giỏ hàng
					</div>
				</header>

				@if(\Cart::count())
				<div class="post-content">
					<table class="shop_table cart">
						@if($cartItems)
						<tbody>
							<?php $i = 1; ?>
							@foreach($cartItems as $item)
							<tr class="cart_table_item {{ (($i % 2) == 1) ? 'even' : 'odd' }}">
								<td class="product-thumbnail hide-on-tablet">
									<a href="{{route('get.product.detail', \Str::slug($item->name.'-'.$item->id))}}">
										<img src="{{ asset(parse_url_file($item->options->image)) }}" width="63" height="63" alt="{{$item->name}}" />
									</a>
								</td>
								<td class="product-name">
									<a href="{{route('get.product.detail', \Str::slug($item->name.'-'.$item->id))}}">
										{{$item->name}}
									</a>
								</td>
								<td class="product-price">
									<span class="amount">
										@if($item->options->sale)
											<del>{{ number_format($item->options->price_old,0,',','.') }} đ</del><br />
											- {{$item->options->sale}}%<br />
										@endif
										{{ number_format($item->price,0,',','.') }} đ
									</span>
								</td>
								<td class="product-quantity hide-on-phone">
									<a href="{{ route('get.cart.update', $item->rowId.'-'.($item->qty - 1)) }}" class="decrease">-</a> 
									<input type="number" value="{{$item->qty}}" name="" min="1" step="1" />
									<a href="{{ route('get.cart.update', $item->rowId.'-'.($item->qty + 1)) }}" class="increase">+</a>
								</td>
								<td class="product-subtotal">
									<span class="amount">{{ number_format($item->price * $item->qty,0,',','.') }} đ</span>
								</td>
								<td class="product-remove">
									<a href="{{route('get.cart.delete', $item->rowId)}}" class="remove">&times;</a>
								</td>
							</tr>
							<?php $i++; ?>
							@endforeach
							<tr>
								<td colspan="6" class="actions">
									<label for="coupon_code">Mã khuyến mãi</label>
									<input name="coupon_code" type="text" class="input-text" id="coupon_code" value="" /> 
									<input type="submit" class="button" name="apply_coupon" value="Áp dụng" />
								</td>
							</tr>
						</tbody>
						@endif
					</table>
					
					<div class="post-content">
						
						<div class="grid">
						
							<!-- Page elements -->
							
							<div class="unit half">
								<!-- Nếu giỏ hàng bằng 0 thì không cho đặt hàng -->
								@if(\Cart::count())
								<h3>Thông tin nhận hàng:</h3>
								
								<form action="{{ route('get.cart.items') }}" method="post">
									@csrf
									<table class="shipping">
										<tr>
											<th>Họ tên <abbr class="required" title="required">*</abbr></th>
											<td><input type="text" name="full_name" placeholder="Tên người nhận..." value="{{(\Auth::check()) ? \Auth::user()->full_name : ''}}" /></td>
										</tr>
										<tr>
											<th>Số điện thoại <abbr class="required" title="required">*</abbr></th>
											<td><input type="text" name="phone" placeholder="Điện thoại..." value="{{(\Auth::check()) ? \Auth::user()->phone : ''}}" /></td>
										</tr>
										<tr>
											<th>Địa chỉ email <abbr class="required" title="required">*</abbr></th>
											<td><input type="email" name="email" placeholder="Địa chỉ email..." value="{{(\Auth::check()) ? \Auth::user()->email : ''}}" /></td>
										</tr>
										<tr>
											<th>Tỉnh/Thành phố <abbr class="required" title="required">*</abbr></th>
											<td>
												<select class="js_location" data-type="city" name="city">
													<option>__Chọn Tỉnh/Thành phố__</option>
													@foreach($cities as $city)
														<option value="{{$city->id}}" {{ (\Auth::user()->city ?? 0 == $city->id) ? "selected='selected'" : "" }}>
															{{$city->name}}
														</option>
													@endforeach
												</select>
											</td>
										</tr>
										<tr>
											<th>Quận/Huyện <abbr class="required" title="required">*</abbr></th>
											<td>
												<select class="js_location" data-type="district" id="district" name="district">
													<option>__Chọn Quận/Huyện__</option>
												</select>
											</td>
										</tr>
										<tr>
											<th>Xã/Phường/Thị trấn <abbr class="required" title="required">*</abbr></th>
											<td>
												<select class="" id="ward" name="ward">
													<option>__Chọn Xã/Phường/Thị trấn__</option>
												</select>
											</td>
										</tr>
										<tr>
											<th>Số nhà <abbr class="required" title="required">*</abbr></th>
											<td><input type="text" name="street_address" placeholder="Địa chỉ nhà..." value="{{(\Auth::check()) ? \Auth::user()->email : ''}}" /></td>
										</tr>
										<tr>
											<td class="submit" colspan="2">
												<button type="submit" class="button">Tiến hành đặt hàng</button>
											</td>
										</tr>
									</table>
								</form>
								@else
									<a href="{{route('get.home')}}" class="button">Tiếp tục mua hàng</a>
								@endif	
							</div>
							
							<div class="unit half">
								<table class="totals">
									<tr>
										<th>Tạm tính</th>
										<td><span class="order-subtotal">{{ str_replace(',','.', \Cart::subtotal(0)) }} đ</span></td>
									</tr>
									<tr>
										<th>Phí vận chuyển</th>
										<td>
											<label><input type="radio" name="shipping" value="" checked="checked" /> Miễn phí</label> <br />
											<label><input type="radio" name="shipping" value="" />Nội thành: 29.000 đ</label> <br />
											<label><input type="radio" name="shipping" value="" />Ngoại thành: 129.000 đ</label>
										</td>
									</tr>
									<tr>
										<th>Thành tiền</th>
										<td>
											<span class="order-total">{{ str_replace(',','.', \Cart::subtotal(0)) }} đ</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>				
				</div>
				@endif
				
			</div>
			
		</section>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(".js_location").change(function (event){
			event.preventDefault();
			let route = "{{ route('getLocationByAjax') }}";
			let $this = $(this);
			let type = $this.attr('data-type');
			let parentId = $this.val();
			$.ajax({
				method: "GET",
				url: route,
				data: {type: type, parent: parentId}
			})
			.done(function(msg){
				if(msg.data) {
					let html = '';
					let element = '';
					if (type == 'city') {
						html = "<option>__Chọn Quận/Huyện__</option>";
						element = '#district';
					} else {
						html = "<option>__Chọn Xã/Phường/Thị trấn__</option>";
						element = '#ward';
					}

					$.each(msg.data, function(index, value){
						html += "<option value='"+value.id+"'>"+value.name+"</option>"
					});

					$(element).html('').append(html);
				}
			});
		});
	});
</script>
@stop