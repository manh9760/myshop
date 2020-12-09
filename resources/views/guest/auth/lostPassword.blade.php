@extends('layouts.guest_layout')

@section('content')
	<div id="content" class="wrapper">
		<div class="grid">
			<section class="unit three-quarters">
				<article class="post">
					<header class="post-header">
						<h1 class="post-title">Đăng nhập</h1>
						<div class="breadcrumbs">
							<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i>
							Quên mật khẩu
						</div>
					</header>
					<form action="{{route('post.LostPassword')}}" method="get" class="lost_reset_password">
						@csrf
						<h3>Lấy lại mật khẩu:</h3>
					
						<p>Nhập địa chỉ email của bạn. Chúng tôi sẽ gửi link để tạo lại mật khẩu mới thông qua email.</p>
						
						@if(\Session::get('invalidEmail') != null)
							<p style="color:red;margin-left:220px;">{{\Session::get('invalidEmail')}}</p>
							{{\Session::put('invalidEmail', null)}}
						@endif
					
						<p>
							<label>Địa chỉ email: </label>
							<input type="email" name="email" />
							<input type="submit" value="Xác nhận" />
						</p>
					</form>
				</article>
				
			</section>

		<aside class="unit one-quarter sidebar sidebar-right">
			<!-- TOP các sản phẩm đang giảm giá -->
			@if(isset($saleProducts))
			<div class="widget widget-slider widget_on_sale">
				<h4 class="widget-title">TOP đang giảm giá</h4>
				@foreach($saleProducts as $product)
				<div class="item">
					<div class="thumbnail">
						<a href="{{ route('get.product.detail', $product->slug.'-'.$product->id) }}">
							<img src="{{ asset(parse_url_file($product->avatar)) }}" width="85" height="85" alt="{{ $product->name }}" />
						</a>
						<div class="onsale appear-animation" data-appear-animation-delay="0.15" data-appear-animation="bounceIn">
							-{{$product->sale}} %
						</div>
					</div>
					<div class="description">
						<a href="{{ route('get.product.detail', $product->slug.'-'.$product->id) }}" class="title">{{ $product->name }}</a>
						<span class="price">
							<span class="old-price">{{number_format($product->price_old,0,',','.')}} đ</span> 
							{{number_format($product->price,0,',','.')}} đ
						</span>
					</div>
				</div>
				@endforeach
			</div>
			@endif
		</aside>

	</div>
</div>
@stop