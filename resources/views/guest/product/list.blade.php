@extends('layouts.guest_layout')

@section('content')
<div id="content" class="wrapper">
	<div class="grid">
		<!-- Phần nội dung bên trái 3/4 -->
		<section class="section-content unit three-quarters">
			<!-- Tên tiêu đề và Đường dẫn -->
			<header class="post-header">
				<h1 class="post-title">{{$category->name}}</h1>
				<div class="breadcrumbs">
					<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i> 
					{{$category->name}}
				</div>
			</header>
			
			<!-- Slide banner -->
			<div class="page-banners-carousel" data-appear-animation="fadeIn">
				<div class="items" style="margin-top:-50px">
					<div class="item">
						<a href="javascript:;">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-5.jpg') }}" alt="" />
						</a>
					</div>
				</div>
			</div>
			
			<!-- Danh sách sản phẩm thuộc danh mục -->
			@if(isset($products))
			<br>
			<div id="shop-posts-list" class="posts view-grid" data-appear-animation="fadeIn">
				@foreach($products as $product)
				<article class="post">
					<div class="outer"></div>
					<div class="inside">
						<div class="thumbnail">
							<a href="{{ route('get.product.detail', $product->slug.'-'.$product->id) }}">
								<img src="{{ asset(parse_url_file($product->avatar)) }}" width="264" height="271" alt="{{$product->name}}" />
							</a>
							<!-- Giảm giá -->
							@if($product->sale)
								<div class="sale" data-appear-animation="rotateIn">-{{$product->sale}}%</div>
							@endif
						</div>
					
						<div class="post-content">
							<h4>
								<a href="{{ route('get.product.detail', $product->slug.'-'.$product->id) }}">
									{{$product->name}}
								</a>
							</h4>
							<div class="rating">
								<!-- Hiển thị số sao review của sản phẩm -->
								@for($i = 0; $i < $product->average_star; $i++)
									<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
								@endfor

								<!-- Trường hợp sản phẩm được đánh giá < 5 sao thì thêm sao rỗng cho đủ 5 sao -->
								@if($product->average_star < 5)
									@for($i = 0; $i < (5 - $product->average_star); $i++)
										<img src="{{ asset('public/guest/images/star-2.png') }}" width="19" height="18" alt="" />
									@endfor	
								@endif
							</div>
							<div class="rating">
								@if($product->sale)
									<del>{{number_format($product->price_old,0,',','.')}} đ</del>
								@endif
								<span><strong>{{number_format($product->price,0,',','.')}} đ</strong></span>
							</div>
							@if($product->number > 0)
								<a href="{{route('get.cart.add', $product->id)}}" class="button desktop">Chọn mua</a>
								<a href="{{route('get.cart.add', $product->id)}}" class="button show-on-phone">Chọn mua</a>
							@else
								<label>Sản phẩm đã hết hàng</label>
							@endif
						</div>
					</div>
				</article>
				@endforeach
			</div>
			@endif

			{!! $products->appends($query ?? [])->links() !!}			
		</section>
		
		<!-- Phần side bar bên phải -->
		@include('guest._components.aside')
	</div>
</div>
@stop