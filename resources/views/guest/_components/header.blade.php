<!-- SMALL PAGE HEADER -->
<header class="small">
	<span class="pull-right">
		<a href="{{ Session::get('userId') ? route('get.cart.index') : route('get.login') }}" class="my-account">
			<i class="fa fa-eye"></i> Theo dõi đơn hàng
		</a>
		<a href="{{route('get.post_list')}}" class="my-cart"><i class="fa fa-info"></i> Tin công nghệ</a>
		<a href="javascript:;" class="my-cart"><i class="fa fa-facebook-square show-tooltip"></i> Mạng xã hội</a>
	</span>      
	<span class="call-to-us">Cửa hàng linh kiện máy tính online</span>
</header>

<!-- BIG HEADER, LOGO AND MENU -->
<div class="big-header-wrapper">
	<a href="page-contact.html" class="header-contact-link"><i class="fa fa-envelope-o"></i></a>
	<div class="wrapper">
		<div class="header-info-block">
			<p><strong>Phone:</strong> +38 012 00 00 001</p>
			<p><strong>Email:</strong> <a href="javascript:;">info@galaxy.com</a></p>
		</div>
		<div class="grid">
			<header class="big box unit whole">
				<div class="grid">
					<div class="unit one-quarter">
						<a href="javascript:;" id="phone-toggle-menu" class="show-on-phone"><i class="fa fa-angle-down"></i></a>
						<a id="logo" href="{{route('get.home')}}"><img src="{{ asset('public/guest/images/logos/logo-vm.png') }}" /></a>
					</div>
		
					<nav id="header-menu" class="unit three-quarters hide-on-phone">
						<ul id="header-menu-ul" class="menu">
							<li class="menu-item level-0"> 
								<form action="{{ route('get.home') }}" method="get">
									<input type="text" name="searchQuery" value="{{Request::get('searchQuery')}}" style="padding:8px;padding-right: 220px" placeholder="Nhập tên sản phẩm..." /> 
									<button type="submit" class="button"><i class="fa fa-search"></i> Tìm kiếm</button>
								</form>
							</li>
							@if(Session::get('userId'))
							<li class="menu-item level-0">
								<a href="#" class="item no-icon">
									<span class="menu-item-content ib">
										<span class="menu-text"><i class="fa fa-user"></i> {{Session::get('userFullName')}} <i class="arrow-drop"></i></span>
									</span>
								</a>
								<ul class="sub-menu">
									<li class="level-1">
										<a href="#" class="item no-icon">
											<span class="menu-item-content ib">
												<span class="menu-text">Đơn hàng đã đặt</span>
											</span>
										</a>
									</li>
									<li class="level-1">
										<a href="#" class="item no-icon">
											<span class="menu-item-content ib">
												<span class="menu-text">Cập nhật tài khoản</span>
											</span>
										</a>
									</li>
									<li class="level-1">
										<a href="{{ route('get.logout') }}" class="item no-icon">
											<span class="menu-item-content ib">
												<span class="menu-text">Đăng xuất</span>
											</span>
										</a>
									</li>
								</ul>
							</li>
							@else
							<li class="menu-item level-0">
								<a href="#" class="item no-icon">
									<span class="menu-item-content ib">
										<span class="menu-text"><i class="fa fa-user"></i> Tài khoản <i class="arrow-drop"></i></span>
									</span>
								</a>
								<ul class="sub-menu">
									<li class="level-1">
										<a href="{{ route('get.login') }}" class="item no-icon">
											<span class="menu-item-content ib">
												<span class="menu-text">Đăng nhập</span>
											</span>
										</a>
									</li>
									<li class="level-1">
										<a href="{{ route('get.register') }}" class="item no-icon">
											<span class="menu-item-content ib">
												<span class="menu-text">Đăng ký</span>
											</span>
										</a>
									</li>
								</ul>
							</li>
							@endif
							<li class="menu-item level-0">
								<a href="{{ route('get.cart.index') }}" class="item no-icon">
									<span class="menu-item-content ib">
										<span class="menu-text"><i class="fa fa-shopping-cart"></i> ({{\Cart::count()}})</span>
									</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</header>
		</div>
	</div>
</div>