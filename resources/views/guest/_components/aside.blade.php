<aside class="unit one-quarter sidebar sidebar-right">
	<!-- Danh mục sản phẩm -->
	@if(isset($categories))
	<div class="widget widget-categories">
		<h4 class="widget-title">Danh mục sản phẩm</h4>
		<ul>
			@foreach($categories as $item)
				<!-- Nếu là trang sản phẩm theo danh mục thì active danh mục hiện tại -->
				<li class="{{ ((isset($categoryID) ? $categoryID : 0) == $item->id) ? 'current' : '' }}">
					<a href="{{route('get.product.list', $item->slug.'-'.$item->id)}}">
						{{$item->name}}<span>{{\DB::table('products')->where('category_id', $item->id)->count()}}</span>
					</a>
				</li>
			@endforeach
		</ul>
	</div>
	@endif

	<!-- Lọc sản phẩm theo thuộc tính -->
	@if(isset($attributes))
	@foreach($attributes as $key => $attribute)
	<div class="widget widget-tags">
		<h4 class="widget-title">{{$key}}</h4>

		@foreach($attribute as $item)
			<a href="{{ request()->fullUrlWithQuery(['attr_'.$item['type'] => $item['id']]) }}" 
				{{Request::get('attr_'.$item['type']) == $item['id'] ? 'style=background-color:#287de7;' : ''}}>{{$item['name']}}</a>
		@endforeach

		<div class="clear"></div>
	</div>
	@endforeach
	@endif
	
	@if($pageTitle != "Tin tức công nghệ")
	<style type="text/css">
		.widget-content .active a {
			color:black;
		}
	</style>
	<!-- Lọc sản phẩm theo khoảng giá -->
	<div class="widget widget-slider widget_price_range">
		<h4 class="widget-title">Chọn khoảng giá</h4>
		<div class="widget-content">
			<ul>
				<li class="{{Request::get('price') == 1 ? '' : 'active'}}">
					<a href="{{ request()->fullUrlWithQuery(['price' => 1]) }}">Dưới 2.000.000 đ</a>
				</li>
				@for($i = 2; $i < 18; $i+=4)
					<li class="{{Request::get('price') == $i ? '' : 'active'}}">
						<a href="{{ request()->fullUrlWithQuery(['price' => $i]) }}">{{$i}}.000.000 đ - {{$i+4}}.000.000 đ</a>
					</li>
				@endfor
				<li class="{{Request::get('price') == 18 ? '' : 'active'}}">
					<a href="{{ request()->fullUrlWithQuery(['price' => 18]) }}">Trên 18.000.000 đ</a>
				</li>
			</ul>
		</div>
	</div>
	@endif

	@if($pageTitle != "Tin tức công nghệ")
	<!-- Lọc sản phẩm theo đánh giá -->
	<div class="widget widget-recent-tweets">
		<h4 class="widget-title">Đánh giá</h4>
		<div class="widget-content">

			<ul>
				<li>
					<a href="#">
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
					</a>
					<span>(Từ 5 sao)</span>
				</li>
				<li>
					<a href="#">
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-2.png') }}" width="19" height="18" alt="" />
					</a>
					<span>(Từ 4 sao)</span>
				</li>
				<li>
					<a href="#">
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-1.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-2.png') }}" width="19" height="18" alt="" />
						<img src="{{ asset('public/guest/images/star-2.png') }}" width="19" height="18" alt="" />
					</a>
					<span>(Từ 3 sao)</span>
				</li>
			</ul>
		</div>
	</div>
	@endif
	
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
	
	<!-- Tin tức công nghệ -->
	@if(isset($posts))
	<div class="widget widget-popular-posts">
		<h4 class="widget-title">Tin mới đăng</h4>
		@foreach($posts as $post)
		<div class="item">
			<div class="thumbnail">
				<a href="{{ route('get.post_detail', $post->slug.'-'.$post->id) }}">
					<img src="{{ asset(parse_url_file($post->avatar)) }}" width="70" height="70" alt="{{$post->title}}" />
				</a>
			</div>
			<div class="text">
				<a href="{{ route('get.post_detail', $post->slug.'-'.$post->id) }}">{{$post->title}}</a>
				<div class="date">{{ $post->created_at->format("d/m/Y") }}</div>
			</div>
		</div>
		@endforeach				
	</div>
	@endif			
</aside>