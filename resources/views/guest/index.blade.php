@extends('layouts.guest_layout')

@section('css')
	<style>
		.page-banners-carousel .items,.slider-carousel .items{
			padding-top:0px;
		}
	</style>
@stop

@section('content')
<!-- CONTENT SECTION -->
<div id="content" class="wrapper">
	<div class="grid">
		<section class="section-content unit three-quarters">
			<!-- Slide banner -->
			<div class="page-banners-carousel" data-appear-animation="fadeIn">
				<div class="items">
					<div class="item">
						<a href="javascript:;">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-1.png') }}" alt="" />
						</a>
					</div>
					<div class="item">
						<a href="javascript:;">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-2.jpg') }}" alt="" />
						</a>
					</div>
					<div class="item">
						<a href="javascript:;">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-3.png') }}" alt="" />
						</a>
					</div>
					<div class="item">
						<a href="javascript:;">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-4.png') }}" alt="" />
						</a>
					</div>
				</div>
			</div>
			
			<!-- Hiển thị sản phẩm -->
			<div id="shop-posts-list" class="posts view-grid" data-appear-animation="fadeIn">
				{{-- 
				@if(isset($products))
					@foreach($products as $product)
						@include('guest._components.product_item',['product'=>$product])
					@endforeach
				@endif
				--}}

				@if(isset($products))
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
									<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
									<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
									<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
									<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
									<img src="{{ asset('public/guest/images/star-2.png') }}" width="19" height="18" alt="" />
								</div>
								<div class="rating">
									@if($product->sale)
										<del>{{number_format($product->price_old,0,',','.')}} đ</del>
									@endif
									<span><strong>{{number_format($product->price,0,',','.')}} đ</strong></span>
								</div>
								<span class="add-to-cart">
									@if($product->number > 0)
										<a href="{{route('get.cart.add', $product->id)}}" class="button desktop">Chọn mua</a>
										<a href="{{route('get.cart.add', $product->id)}}" class="button show-on-phone">Chọn mua</a>
									@else
										<label>Sản phẩm đã hết hàng</label>
									@endif
								</span>
							</div>
						</div>
					</article>
					@endforeach
				@endif
			</div>
		
			<!-- Phân trang -->
			{!! $products->appends($query ?? [])->links() !!}
			<!-- <div class="pagination">						
				<div class="numeric">
					<a href="javascript:;" class="button current">1</a>
					<a href="javascript:;" class="button dark">2</a>
					<a href="javascript:;" class="button dark">Next</a>
				</div>
			</div> -->
		</section>
		
		<!-- Phần side bar bên phải -->
		@include('guest._components.aside')
		
	</div>
</div>
@stop