<aside class="unit one-quarter sidebar sidebar-right">
	<div class="widget widget-categories">
		<ul>
			<li class="{{$page == 'info' ? 'current' : ''}}">
				<a href="{{ route('get.user.info', Session::get('userId')) }}">
					Thông tin tài khoản<span><i class="fa fa-user"></i></span>
				</a>
			</li>
			<li class="{{$page == 'orders' ? 'current' : ''}}">
				<a href="{{ route('get.user.order', Session::get('userId')) }}">
					Quản lý đơn hàng<span><i class="fa fa-bell"></i></span>
				</a>
			</li>
			<li class="{{$page == 'reviews' ? 'current' : ''}}">
				<a href="{{ route('get.user.review', Session::get('userId')) }}">
					Đánh giá sản phẩm đã mua<span><i class="fa fa-pencil"></i></span>
				</a>
			</li>
		</ul>
	</div>
</aside>