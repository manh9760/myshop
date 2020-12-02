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
						<a href="{{route('get.product.detail', 'card-man-hinh-asus-rog-strix-rtx3090-24g-gaming-2')}}">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-1.png') }}" alt="" />
						</a>
					</div>
					<div class="item">
						<a href="{{route('get.product.detail', 'cpu-amd-ryzen-9-5950x-10')}}">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-2.png') }}" alt="" />
						</a>
					</div>
					<div class="item">
						<a href="{{route('get.product.detail', 'o-cung-ssd-seagate-barracuda-120-500gb-25-inch-sata-6gbs-13')}}">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-3.png') }}" alt="" />
						</a>
					</div>
					<div class="item">
						<a href="{{route('get.product.detail', 'nguon-asus-rog-thor-850w-platinum-15')}}">
							<img class="main" src="{{ asset('public/guest/images/banners/banner-4.jpg') }}" alt="" />
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
			<!-- {!! $products->appends($query ?? [])->links() !!} -->
			@if ($products->lastPage() > 1)
			<div class="pagination">
				<div class="numeric">
					@if($products->currentPage() != 1)
						<a href="{{ $products->url(1) }}" class="button {{ ($products->currentPage() == 1) ? 'current' : 'dark' }}">Trước</a>
					@endif

				    @for ($i = 1; $i <= $products->lastPage(); $i++)
				        <a href="{{ $products->url($i) }}" class="button {{ ($products->currentPage() == $i) ? 'current' : 'dark' }}">{{ $i }}</a>
				    @endfor

				    @if($products->currentPage() != $products->lastPage())
				    	<a href="{{ $products->url($products->currentPage()+1) }}" class="button {{ ($products->currentPage() == $products->lastPage()) ? 'current' : 'dark' }}">Sau</a>
				    @endif
				</div>
			</div>
			@endif

			<!--
 			<div class="pagination">						
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