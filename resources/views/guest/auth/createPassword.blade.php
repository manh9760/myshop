@extends('layouts.guest_layout')

@section('content')
<div id="content" class="wrapper">
	<div class="grid">
		
		<section class="unit three-quarters">
			<article class="post">
				<!-- Tên tiêu đề và Đường dẫn -->
				<header class="post-header">
					<h1 class="post-title">Tạo mật khẩu mới</h1>
					<div class="breadcrumbs">
						<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i>
						Tạo mật khẩu mới
					</div>
				</header>

				<h3>Tạo mới mật khẩu</h3>

				<form method="get" class="login" action="{{route('get.user.savePassword', $user->id)}}">
					@csrf
					<p>
						<label for="password">Mật khẩu mới: <span class="required">*</span></label>
						<input type="password" id="password" name="password" style="width: 390px;" value="" class="{{ $errors->first('password') ? 'has-error':'' }}" />
						@if($errors->first('password'))
			            	<span style="color:red;">{{ $errors->first('password') }}</span>
			          	@endif
					</p>
					
					<p>
						<label for="confirm_password">Nhập lại mật khẩu: <span class="required">*</span></label>
						<input type="password" id="confirm_password" name="confirm_password" />
						@if(\Session::get('invalidConfirmPassword') != null)
			            	<span style="color:red;">{{\Session::get('invalidConfirmPassword')}}</span>
			            	{{\Session::put('invalidConfirmPassword', null)}}
			          	@endif
					</p>
					
					<p style="margin-left:220px;">
						<input type="submit" value="Lưu lại" />
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