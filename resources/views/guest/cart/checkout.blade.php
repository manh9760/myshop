<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<title>Galaxy Theme</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	<!-- ie favicon -->
	<link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon" />
	<!-- common browsers favicon -->
	<link rel="icon" href="images/favicon/favicon.png" type="image/x-icon" />
	<!-- Standard iPhone --> 
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/57x57.png" />
	<!-- Retina iPhone --> 
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/114x114.png" />
	<!-- Standard iPad --> 
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/72x72.png" />
	<!-- Retina iPad --> 
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/144x144.png" />
	<!--[if lt IE 9]>
	<script src="{{ asset('public/guest/js/libs/respond.min.js') }}"></script>
	<![endif]-->
	<link rel="stylesheet" title="blue" href="{{ asset('public/guest/css/skin-blue.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="brown" href="{{ asset('public/guest/css/skin-brown.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="dark-green" href="{{ asset('public/guest/css/skin-dark-green.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="gray" href="{{ asset('public/guest/css/skin-gray.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="light-green" href="{{ asset('public/guest/css/skin-light-green.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="orange" href="{{ asset('public/guest/css/skin-orange.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="pink" href="{{ asset('public/guest/css/skin-pink.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="purple" href="{{ asset('public/guest/css/skin-purple.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="red" href="{{ asset('public/guest/css/skin-red.css') }}" type="text/css" media="all" />
	<link rel="alternate stylesheet" title="sky-blue" href="{{ asset('public/guest/css/skin-sky-blue.css') }}" type="text/css" media="all" />
	
	<link rel="stylesheet" id="font-awesome-css" href="{{ asset('public/guest/css/libs/font-awesome/css/font-awesome.min.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" id="magnific-popup-css" href="{{ asset('public/guest/css/libs/magnific-popup.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" id="animate-css" href="{{ asset('public/guest/css/libs/animate.min.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('public/guest/css/libs/liquid-slider.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('public/guest/css/libs/owl.carousel.css') }}" type="text/css" media="all" />
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="{{ asset('public/guest/css/ie.css') }}">
		<script src="{{ asset('public/guest/js/libs/html5.js') }}"></script>
	<![endif]-->
	<link href="http://fonts.googleapis.com/css?family=Bitter|Roboto:400,300,700|Roboto+Slab:300,400,700" rel="stylesheet" type="text/css" />
	<script src="{{ asset('public/guest/js/libs/jquery-1.10.2.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/retina-1.1.0.min.js') }}"></script>
</head>
<body class="widgetized-footer page woocommerce-checkout">
<div class="primary-wrapper">
	<!-- 
	
		SMALL PAGE HEADER
		
	-->

	<header class="small">
		
		<form method="get" action="javascript:;" id="top-search-form" class="pull-right">
			<fieldset>
				<input type="text" name="s" value="" placeholder="Search..." />
				<a href="javascript:;"><i class="fa fa-search"></i></a>
			</fieldset>
		</form>
		
		<span class="pull-right">
			<a href="javascript:;" class="my-account"><i class="fa fa-user"></i> My account</a>
			<a href="javascript:;" class="my-cart"><i class="fa fa-shopping-cart"></i> Cart: 7 items / $99.00</a>
		</span>
		
		<!--
		
			ON HOVER CART
			
		-->
		<div id="wproto-ajax-header-cart">
			<div class="triangle"></div>
			<div class="inner">
				<div class="cart-content">
				
					<div class="item">
						<a href="javascript:;" class="cart-remove">&times;</a>
						<div class="thumb">
							<a href="javascript:;">
								<img src="images/temp/recent-product-1.jpg" width="75" alt="" />
							</a>
						</div>
						<div class="desc">
							<h3>Samsung Galaxy S4</h3>
							<div class="count">
								1 &times; <ins><span class="amount">$1550</span></ins>
							</div>
						</div>
					</div>
					
					<div class="item">
						<a href="javascript:;" class="cart-remove">&times;</a>
						<div class="thumb">
							<a href="javascript:;">
								<img src="images/temp/recent-product-2.jpg" width="75" alt="" />
							</a>
						</div>
						<div class="desc">
							<h3>Samsung Galaxy S4</h3>
							<div class="count">
								1 &times; <ins><span class="amount">$1550</span></ins>
							</div>
						</div>
					</div>
					
					<div class="cart-subtotal">
						Cart subtotal: 
						<span class="pull-right"><span class="amount">$1550</span></span>
						<div class="clear"></div>
					</div>
					
					<div class="cart-links">
						<a href="page-cart.html" class="button pull-left">View Cart</a>
						<a href="page-checkout.html" class="button pull-right">Checkout</a>
						<div class="clear"></div>
					</div>
				
				</div>
			</div>
		</div>
		
		<span class="social-icons">
			<a href="javascript:;"><i title="Pinterest" class="fa fa-pinterest-square show-tooltip"></i></a> 
			<a href="javascript:;"><i title="Facebook" class="fa fa-facebook-square show-tooltip"></i></a> 
			<a href="javascript:;"><i title="Dribbble" class="fa fa-dribbble show-tooltip"></i></a> 
			<a href="javascript:;"><i title="Linkedin" class="fa fa-linkedin-square show-tooltip"></i></a>
			<a href="javascript:;"><i title="Twitter" class="fa fa-twitter-square show-tooltip"></i></a>
		</span>      
		
		<span class="call-to-us">Call us: <a href="javascript:;">+3 8 032 654 321 98</a></span>
		
	</header>

	<!--
	
		BIG HEADER, LOGO AND MENU
		
	-->
	
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
						
							<a id="logo" href="index.html"><img src="images/logo.png" width="187" height="46" alt="" /></a>
							
						</div>
			
						<nav id="header-menu" class="unit three-quarters hide-on-phone">
					
							<ul id="header-menu-ul" class="menu">
								<li class="menu-item level-0">
									<!--
									
										TO REMOVE MENU ICON, CHANGE CLASSNAME TO "NO-ICON"
										
									-->
									<a href="index.html" class="item no-icon">
										<span class="menu-item-content ib">
											<span class="menu-text">Home <i class="arrow-drop"></i></span>
										</span>
									</a>
									<ul class="sub-menu">
										<li class="level-1">
											<a href="index.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Blog layout</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="index-business.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Business layout</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="index-portfolio.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Portfolio layout</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="index-parallax.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Parallax layout</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="index-one-page.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">One page layout</span>
												</span>
											</a>
										</li>
									</ul>
								</li>
								<li class="menu-item level-0 mega-menu">
									<a href="shop.html" class="item no-icon">
										<span class="menu-item-content ib">
											<span class="menu-text">Shop <i class="arrow-drop"></i></span>
										</span>
									</a>
									
									<div class="wproto-mega-menu-content box">
										<ul class="ul-item">
											<li class="lvl-0">
												<a href="shop-grid.html">Gadgets</a> <span class="new-item">new</span>
												<ul>
													<li class="lvl-1"><a href="shop-grid.html">Mobile phones</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Smartphones</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Tablets</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Nootebooks</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Watches</a></li>
												</ul>
											</li>
											<li class="lvl-0">
												<a href="shop.html">Music</a>
												<ul>
													<li class="lvl-1"><a href="shop.html">Earphones</a></li>
													<li class="lvl-1"><a href="shop.html">Players</a></li>
													<li class="lvl-1"><a href="shop.html">Acustic</a></li>
													<li class="lvl-1"><a href="shop.html">Speakers</a> <span class="featured-item"><i class="fa fa-thumbs-up"></i></span></li>
													<li class="lvl-1"><a href="shop.html">Albums</a></li>
													<li class="lvl-1"><a href="shop.html">Amplifiers</a></li>
												</ul>
											</li>
											<li class="lvl-0">
												<a href="shop-grid.html">PC parts</a>
												<ul>
													<li class="lvl-1"><a href="shop-grid.html">SSD</a> <span class="featured-item"><i class="fa fa-thumbs-up"></i></span></li>
													<li class="lvl-1"><a href="shop-grid.html">Procesors</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Video</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Monitors</a></li>
													<li class="lvl-1"><a href="shop-grid.html">USB gadgets</a></li>
												</ul>
											</li>
											<li class="lvl-0">
												<a href="shop.html">Presents</a>
												<ul>
													<li class="lvl-1"><a href="shop.html">USB gadgets</a></li>
													<li class="lvl-1"><a href="shop.html">Smartphones</a></li>
													<li class="lvl-1"><a href="shop.html">Tablets</a></li>
													<li class="lvl-1"><a href="shop.html">Books</a> <span class="new-item">new</span></li>
													<li class="lvl-1"><a href="shop.html">Audio gadgets</a></li>
													<li class="lvl-1"><a href="shop.html">Tablets</a></li>
												</ul>
											</li>
											<li class="lvl-0">
												<a href="shop-grid.html">Clothing</a>
												<ul>
													<li class="lvl-1"><a href="shop-grid.html">Men shoes</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Women shoes</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Outerwear</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Hats</a></li>
													<li class="lvl-1"><a href="shop-grid.html">Undercoat</a></li>
												</ul>
											</li>
											<li class="lvl-0">
												<!--
												
													FEATURED CATEGORY MENU ITEM
													
												-->
												<a href="shop-grid.html">Some Featured Category</a>
												<div class="featured-cat-img">
													<div class="post-slider-carousel">
														<img src="images/temp/featured-cat-1.jpg" width="290" height="80" alt="" />
														<img src="images/temp/featured-cat-2.jpg" width="290" height="80" alt="" />
													</div>
													<span class="post-slider-prev"></span>
													<span class="post-slider-next"></span>
													<div class="clear"></div>
												</div>
												<div class="featured-cat-desc">
													Tincidunt, magnis, est lacus ac egestas! Proin amet ultrices, velit? Mattis montes dictumst enim? Ut pulvinar velit in mid.
												</div>
												<a href="shop-grid.html" class="more">Learn more</a>
											</li>
										</ul>
										<div class="clear"></div>
									</div>
									
								</li>
								<li class="menu-item current-menu-item current_page_item current-menu-ancestor current-menu-parent level-0">
									<a href="page-features.html" class="item no-icon">
										<span class="menu-item-content ib">
											<span class="menu-text">Pages <i class="arrow-drop"></i></span>
										</span>
									</a>
									<ul class="sub-menu">
										<li class="level-1">
											<a href="page-features.html" class="item with-icon">
												<!--<span class="icon"><i class="fa fa-star"></i></span>-->
												<span class="menu-item-content ib">
													<span class="menu-text">Theme Features</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="page-elements.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Elements / Shortcodes</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="page-widgets_custom.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Widgets <i class="menu-angle"></i></span>
												</span>
											</a>
											<ul class="sub-menu">
												<li class="level-2">
													<a href="page-widgets_custom.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Custom Widgets</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-widgets_custom_footer.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Custom Widgets (Footer)</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-widgets_wp.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Standard Widgets</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-widgets_wp_footer.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Standard Widgets (Footer)</span>
														</span>
													</a>
												</li>
											</ul>
										</li>
										<li class="level-1">
											<a href="page-left-sidebar.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Page Layouts <i class="menu-angle"></i></span>
												</span>
											</a>
											<ul class="sub-menu">
												<li class="level-2">
													<a href="page-left-sidebar.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Page with left sidebar</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-right-sidebar.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Page with right sidebar</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-full-width.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Full-width page</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-simple-footer.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Simple footer</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-widgetized-footer.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Widgetized footer</span>
														</span>
													</a>
												</li>
											</ul>
										</li>
										<li class="level-1">
											<a href="page-cart.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">E-Commerce <i class="menu-angle"></i></span>
												</span>
											</a>
											<ul class="sub-menu">
												<li class="level-2">
													<a href="shop.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Shop (list layout)</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="shop-grid.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Shop (grid layout)</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="shop-single.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Single product</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-cart.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Cart</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-checkout.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Checkout</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="page-lost-password.html" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Lost password</span>
														</span>
													</a>
												</li>
											</ul>
										</li>
										<li class="level-1">
											<a href="javascript:;" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Custom menu <i class="menu-angle"></i></span>
												</span>
											</a>
											<ul class="sub-menu">
												<li class="level-2">
													<a href="javascript:;" class="item no-icon">
														<span class="menu-item-content ib">
															<span class="menu-text">Im hidden from mobiles</span>
														</span>
													</a>
												</li>
												<li class="level-2">
													<a href="javascript:;" class="item with-icon">
														<span class="icon"><i class="fa fa-star"></i></span>
														<span class="menu-item-content ib">
															<span class="menu-text">Menu item with icon</span>
														</span>
													</a>
												</li>
											</ul>
										</li>
										<li class="level-1">
											<a href="page-animations.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Animations</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="page-pricing_tables.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Pricing Tables</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="page-coming-soon.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Coming soon page</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="page-single.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Single post / page</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="page-author.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Author page</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="page-search-results.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Search page</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="page-404.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Error 404</span>
												</span>
											</a>
										</li>
									</ul>
								</li>
								<li class="menu-item level-0">
									<a href="portfolio-hexagon.html" class="item no-icon">
										<span class="menu-item-content ib">
											<span class="menu-text">Portfolio <i class="arrow-drop"></i></span>
										</span>
									</a>
									<ul class="sub-menu">
										<li class="level-1">
											<a href="portfolio-hexagon.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Hexagon view</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="portfolio-masonry.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Masonry view</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="portfolio-timeline.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Timeline</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="portfolio-four-columns.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Four columns</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="portfolio-one-column-list.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">One column list</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="portfolio-one-column-grid.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">One column grid</span>
												</span>
											</a>
										</li>
									</ul>
								</li>
								<li class="menu-item level-0">
									<a href="javascript:;" class="item no-icon">
										<span class="menu-item-content ib">
											<span class="menu-text">Content <i class="arrow-drop"></i></span>
										</span>
									</a>
									<ul class="sub-menu">
										<li class="level-1">
											<a href="videos.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Videos</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="photoalbums.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Photo Albums</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="catalog.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Catalog</span>
												</span>
											</a>
										</li>
									</ul>
								</li>
								<li class="menu-item level-0">
									<a href="blog-masonry.html" class="item no-icon">
										<span class="menu-item-content ib">
											<span class="menu-text">Blog <i class="arrow-drop"></i></span>
										</span>
									</a>
									<ul class="sub-menu">
										<li class="level-1">
											<a href="blog-masonry.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Masonry</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="blog-timeline.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Timeline</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="blog-one_column.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">One column list</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="blog-one_column_grid.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">One column grid</span>
												</span>
											</a>
										</li>
										<li class="level-1">
											<a href="blog-four_columns.html" class="item no-icon">
												<span class="menu-item-content ib">
													<span class="menu-text">Four columns</span>
												</span>
											</a>
										</li>
									</ul>
								</li>
								<li class="menu-item level-0">
									<a href="page-contact.html" class="item no-icon">
										<span class="menu-item-content ib">
											<span class="menu-text">Contact</span>
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
	
	<!-- 
	
		CONTENT SECTION
		
	-->
	
	<div id="content" class="wrapper">
		<div class="grid">
			
			<section class="unit three-quarters">
				
				<article class="post">
					<!--
					
						POST HEADER
						
					-->
				
					<header class="post-header">
						<h1 class="post-title">Checkout</h1>
						<div class="breadcrumbs"><a href="javascript:;">Home</a> <i class="delimeter"></i> <a href="javascript:;">Shop</a> <i class="delimeter"></i> Checkout</div>
					</header>
					
					<form name="checkout" method="post" action="javascript:;" class="checkout">
					
						<div class="col2-set" id="customer_details">

							<div class="col-1">
							
								<h3>Thông tin nhận hàng</h3>
								
								<div class="error">
									(*) Thông tin bắt buộc nhập
								</div>
								
								<p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field">
									<label for="billing_country" class="">Country <abbr class="required" title="required">*</abbr></label>
									<select name="billing_country" id="billing_country" class="country_to_state country_select" >
										<option value="">Select a country&hellip;</option>
										<option value="AX" >&#197;land Islands</option>
										<option value="AF" >Afghanistan</option>
										<option value="AL" >Albania</option>
										<option value="DZ" >Algeria</option>
										<option value="KY" >Cayman Islands</option>
										<option value="CF" >Central African Republic</option>
									</select>
								</p>

								<p class="form-row form-row-first validate-required">
									<label for="full_name" class="">
										Họ tên <abbr class="required" title="required">*</abbr>
										@if($errors->first('full_name'))
							            	<span style="color:red;font-weight: normal;">{{ $errors->first('full_name') }}</span>
							          	@endif
									</label>
									<input type="text" class="input-text" name="full_name" value="{{$user ? $user->full_name : ''}}" />
								</p>

								<p class="form-row form-row-last validate-required" id="billing_last_name_field">
									<label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
									<input type="text" class="input-text" name="billing_last_name" id="billing_last_name" placeholder=""  value=""  />
								</p>
								
								<div class="clear"></div>

								<p class="form-row form-row-wide" id="billing_company_field">
									<label for="billing_company" class="">Company Name</label>
									<input type="text" class="input-text" name="billing_company" id="billing_company" placeholder=""  value=""  />
								</p>

								<p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field">
									<label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
									<input type="text" class="input-text" name="billing_address_1" id="billing_address_1" placeholder="Street address" value=""  />
								</p>

								<p class="form-row form-row-wide address-field" id="billing_address_2_field">
									<input type="text" class="input-text" name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)" value=""  />
								</p>

								<p class="form-row form-row-wide address-field validate-required" id="billing_city_field">
									<label for="billing_city" class="">Town / City <abbr class="required" title="required">*</abbr></label>
									<input type="text" class="input-text" name="billing_city" id="billing_city" placeholder="Town / City"  value=""  />
								</p>

								<p class="form-row form-row-first address-field" id="billing_state_field">
									<label for="billing_state" class="">County</label>
									<input type="text" class="input-text" value=""  placeholder="State / County" name="billing_state" id="billing_state"  />
								</p>

								<p class="form-row form-row-last address-field validate-required" id="billing_postcode_field">
									<label for="billing_postcode" class="">Postcode <abbr class="required" title="required">*</abbr></label>
									<input type="text" class="input-text" name="billing_postcode" id="billing_postcode" placeholder="Postcode / Zip" value=""  />
								</p>
								<div class="clear"></div>

								<p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
									<label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
									<input type="text" class="input-text" name="billing_email" id="billing_email" placeholder="" value=""  />
								</p>

								<p class="form-row form-row-last validate-required" id="billing_phone_field">
									<label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
									<input type="text" class="input-text" name="billing_phone" id="billing_phone" placeholder=""  value=""  />
								</p>
								<div class="clear"></div>

							</div>
							
							<div class="col-2">
								
								<h3>Shipping Address</h3>
								
								<p class="form-row" id="shiptobilling">
									<label>
										<input type="radio" checked="checked" id="shiptobilling-1" name="shiptobilling" value="" /> Ship to billing adress
									</label>
									<label>
										<input type="radio" id="shiptobilling-2" name="shiptobilling" value="1" /> Enter shipping address
									</label>
								</p>
								
								<div class="shipping_address" style="display: none;">

										<p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field">
											<label for="shipping_country" class="">Country <abbr class="required" title="required">*</abbr></label>
											<select name="shipping_country" id="shipping_country" class="country_to_state country_select" >
												<option value="">Select a country&hellip;</option>
												<option value="AX" >&#197;land Islands</option>
												<option value="AF" >Afghanistan</option>
												<option value="AL" >Albania</option>
											</select>
										</p>
		
										<p class="form-row form-row-first validate-required" id="shipping_first_name_field">
											<label for="shipping_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
											<input type="text" class="input-text" name="shipping_first_name" id="shipping_first_name" placeholder=""  value=""  />
										</p>
		
										<p class="form-row form-row-last validate-required" id="shipping_last_name_field">
											<label for="shipping_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
											<input type="text" class="input-text" name="shipping_last_name" id="shipping_last_name" placeholder=""  value=""  />
										</p><div class="clear">
								
									</div>
		
									<p class="form-row form-row-wide" id="shipping_company_field">
										<label for="shipping_company" class="">Company Name</label>
										<input type="text" class="input-text" name="shipping_company" id="shipping_company" placeholder=""  value=""  />
									</p>
		
									<p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field">
										<label for="shipping_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text" name="shipping_address_1" id="shipping_address_1" placeholder="Street address" value=""  />
									</p>
		
									<p class="form-row form-row-wide address-field" id="shipping_address_2_field">
										<input type="text" class="input-text" name="shipping_address_2" id="shipping_address_2" placeholder="Apartment, suite, unit etc. (optional)"  value=""  />
									</p>
		
									<p class="form-row form-row-wide address-field validate-required" id="shipping_city_field">
										<label for="shipping_city" class="">Town / City <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text" name="shipping_city" id="shipping_city" placeholder="Town / City"  value=""  />
									</p>
		
									<p class="form-row form-row-first address-field" id="shipping_state_field">
										<label for="shipping_state" class="">County</label>
										<input type="text" class="input-text" value=""  placeholder="State / County" name="shipping_state" id="shipping_state"  />
									</p>
		
									<p class="form-row form-row-last address-field validate-required" id="shipping_postcode_field">
										<label for="shipping_postcode" class="">Postcode <abbr class="required" title="required">*</abbr></label>
										<input type="text" class="input-text" name="shipping_postcode" id="shipping_postcode" placeholder="Postcode / Zip" value=""  />
									</p>
								
									<div class="clear"></div>
							
									<p class="form-row notes" id="order_comments_field">
										<label for="order_comments" class="">Order Notes</label>
										<textarea name="order_comments" class="input-text" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." cols="5" rows="2" ></textarea>
									</p>
							
								</div>
							
							</div>
						
							<div class="clear"></div>
						
							<h3 id="order_review_heading">Your order</h3>
						
							<div id="order_review">

								<table class="shop_table">
									<thead>
										<tr>
											<th class="product-name"><span>Product</span></th>
											<th class="product-total"><span>Total</span></th>
										</tr>
									</thead>
									<tfoot>
										<tr class="cart-subtotal">
											<th>Cart Subtotal</th>
											<td><span class="amount">&pound;22</span></td>
										</tr>
										<tr class="shipping">
											<th>Shipping</th>
											<td>Free Shipping<input type="hidden" name="shipping_method" id="shipping_method" value="free_shipping" /></td>
										</tr>
										<tr class="total">
											<th><strong>Order Total</strong></th>
											<td>
												<strong><span class="amount">&pound;22</span></strong>
											</td>
										</tr>
									</tfoot>
									<tbody>
										<tr class="checkout_table_item even">
											<td class="product-name">Smart TV full HD new Pro <strong class="product-quantity">&times;1</strong></td>
											<td class="product-total"><span class="amount">$1099</span></td>
										</tr>
										<tr class="checkout_table_item odd">
											<td class="product-name">Photo NX 3000 <strong class="product-quantity">&times;2</strong></td>
											<td class="product-total"><span class="amount">$899</span></td>
										</tr>
										<tr class="checkout_table_item even">
											<td class="product-name">Smartphone Galaxy 5 <strong class="product-quantity">&times;1</strong></td>
											<td class="product-total"><span class="amount">$2277</span></td>
										</tr>
										<tr class="checkout_table_item odd">
											<td class="product-name">Smart TV full HD <strong class="product-quantity">&times;1</strong></td>
											<td class="product-total"><span class="amount">$780</span></td>
										</tr>
									</tbody>
								</table>

								<div id="payment">
									<ul class="payment_methods methods">
										<li>
											<input type="radio" id="payment_method_bacs" class="input-radio" name="payment_method" value="bacs" checked="checked" />
											<label for="payment_method_bacs">Direct Bank Transfer </label>
											<div class="payment_box payment_method_bacs" >
												<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
											</div>
										</li>
										<li>
											<input type="radio" id="payment_method_cheque" class="input-radio" name="payment_method" value="cheque"  />
											<label for="payment_method_cheque">Cheque Payment </label>
											<div class="payment_box payment_method_cheque" style="display:none;">
												<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
											</div>
										</li>
										<li>
											<input type="radio" id="payment_method_paypal" class="input-radio" name="payment_method" value="paypal"  />
											<label for="payment_method_paypal">PayPal</label>
												<div class="payment_box payment_method_paypal" style="display:none;"><p>Pay via PayPal; you can pay with your credit card if you don&#8217;t have a PayPal account</p>
											</div>
										</li>
									</ul>
		
									<div class="form-row place-order">

										<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" />

									</div>

									<div class="clear"></div>

								</div>

							</div>
						
						</div>
					
					</form>
					
				</article>
				
			</section>
			
			<!--
	
				SIDEBAR
		
			-->
			
			<aside class="unit one-quarter sidebar sidebar-right">
			
				<!--
					OUR TEAM WIDGET
				-->
				<div class="widget widget_our_team">
				
					<h4 class="widget-title">Our Team</h4>
					
					<div class="items">
					
						<div class="item">
						
							<div class="image">
							
								<img src="images/temp/avatar_2.jpg" width="70" alt="" />
								
								<div class="name">
								
									<a href="javascript:;" class="title">John Robertson</a>
									
									<a href="javascript:;"><i data-tip-gravity="s" title="Pinterest" class="fa fa-pinterest-square show-tooltip"></i></a> 
									<a href="javascript:;"><i data-tip-gravity="s" title="Facebook" class="fa fa-facebook-square show-tooltip"></i></a> 
									<a href="javascript:;"><i data-tip-gravity="s" title="Dribbble" class="fa fa-dribbble show-tooltip"></i></a> 
									<a href="javascript:;"><i data-tip-gravity="s" title="Linkedin" class="fa fa-linkedin-square show-tooltip"></i></a>
								
								</div>
							
							</div>
							
							<dl>
								<dt>Position:</dt>
								<dd>senior designer</dd>
								<dt>Age:</dt>
								<dd>28</dd>
								<dt>Experience:</dt>
								<dd>7 years</dd>
							</dl>
						
						</div>
						
						<div class="item">
						
							<div class="image">
							
								<img src="images/temp/avatar_3.jpg" width="70" alt="" />
								
								<div class="name">
								
									<a href="javascript:;" class="title">Svetlana Doe</a>
									
									<a href="javascript:;"><i title="Pinterest" class="fa fa-pinterest-square show-tooltip"></i></a> 
									<a href="javascript:;"><i title="Facebook" class="fa fa-facebook-square show-tooltip"></i></a> 
									<a href="javascript:;"><i title="Dribbble" class="fa fa-dribbble show-tooltip"></i></a> 
									<a href="javascript:;"><i title="Linkedin" class="fa fa-linkedin-square show-tooltip"></i></a>
								
								</div>
							
							</div>
							
							<dl>
								<dt>Position:</dt>
								<dd>Web developer</dd>
								<dt>Age:</dt>
								<dd>33</dd>
								<dt>Experience:</dt>
								<dd>13 years</dd>
							</dl>
						
						</div>
					
					</div>
				
				</div>
			
				<!--
					LATEST POSTS WIDGET
				-->
				<div class="widget widget-latest-posts">
				
					<h4 class="widget-title">Recent Posts</h4>
				
					<div class="item">
					
						<div class="thumbnail">
							<a href="javascript:;"><img src="images/temp/banner_1.jpg" width="270" alt="" /></a>
						</div>
						
						<a class="title" href="javascript:;">There are many king of variations</a>
						
						<span class="date">15 June 2013</span>
						
						<a href="javascript:;" class="comments"><i class="fa fa-comments-o"></i> 146</a>
					
					</div>
					
					<div class="item">
					
						<div class="thumbnail">
							<a href="javascript:;"><img src="images/temp/banner_2.jpg" width="270" alt="" /></a>
						</div>
						
						<a class="title" href="javascript:;">There are many king of variations</a>
						
						<span class="date">15 June 2013</span>
						
						<a href="javascript:;" class="comments"><i class="fa fa-comments-o"></i> 146</a>
					
					</div>
					
					<div class="item">
					
						<div class="thumbnail">
							<a href="javascript:;"><img src="images/temp/banner_3.jpg" width="270" alt="" /></a>
						</div>
						
						<a class="title" href="javascript:;">There are many king of variations</a>
						
						<span class="date">15 June 2013</span>
						
						<a href="javascript:;" class="comments"><i class="fa fa-comments-o"></i> 146</a>
					
					</div>
				
				</div>
			
				<!--
					POPULAR POSTS WIDGET
				-->
				<div class="widget widget-popular-products">
				
					<h4 class="widget-title">Popular products:</h4>

					<div class="item">
					
						<div class="thumbnail">
							<a href="javascript:;"><img src="images/temp/recent-product-1.jpg" width="85" height="85" alt="" /></a>
							<div class="number appear-animation" data-appear-animation-delay="0.15" data-appear-animation="bounceIn">1</div>
						</div>
						
						<div class="description">
						
							<a href="javascript:;" class="title">There are many king of variations</a>
							<a href="javascript:;" class="price"><span class="old-price">$769</span> $659</a>
						
						</div>
					
					</div>
					
					<div class="item">
					
						<div class="thumbnail">
							<a href="javascript:;"><img src="images/temp/recent-product-2.jpg" width="85" height="85" alt="" /></a>
							<div class="number appear-animation" data-appear-animation-delay="0.3" data-appear-animation="bounceIn">2</div>
						</div>
						
						<div class="description">
						
							<a href="javascript:;" class="title">Many variations to see the sun</a>
							<a href="javascript:;" class="price"><span class="old-price">$859</span> $759</a>
						
						</div>
					
					</div>
					
					<div class="item">
					
						<div class="thumbnail">
							<a href="javascript:;"><img src="images/temp/recent-product-3.jpg" width="85" height="85" alt="" /></a>
							<div class="number appear-animation" data-appear-animation-delay="0.45" data-appear-animation="bounceIn">3</div>
						</div>
						
						<div class="description">
						
							<a href="javascript:;" class="title">Home design house and rooms</a>
							<a href="javascript:;" class="price">$759</a>
						
						</div>
					
					</div>
					
					<div class="item">
					
						<div class="thumbnail">
							<a href="javascript:;"><img src="images/temp/recent-product-4.jpg" width="85" height="85" alt="" /></a>
							<div class="number appear-animation" data-appear-animation-delay="0.6" data-appear-animation="bounceIn">4</div>
						</div>
						
						<div class="description">
						
							<a href="javascript:;" class="title">Business ideas and deals</a>
							<a href="javascript:;" class="price">$357</a>
						
						</div>
					
					</div>
				
				</div>
				
				<!--
					SEARCH WIDGET
				-->
				<div class="widget widget-search">
					<form action="javascript:;" method="get">
						<input type="text" placeholder="Search request here" name="s" value="" />
						<a href="javascript:;" class="button"><i class="fa fa-search"></i></a>
					</form>
				</div>
				
				<!--
					SLIDER WIDGET
				-->
				<div class="widget widget-slider">
				
					<div class="slides">
						<img src="images/temp/banner_1.jpg" alt="" />
						<img src="images/temp/banner_2.jpg" alt="" />
						<img src="images/temp/banner_3.jpg" alt="" />
					</div>
					
					<div class="slider-pagination"></div>
				
				</div>
				
				<!--
					RECENT TWEETS WIDGET
				-->
				<div class="widget widget-recent-tweets">
				
					<h4 class="widget-title">Recent tweets:</h4>
					
					<ul>
						<li>
							<div class="icon">
								<i class="fa fa-twitter"></i>
							</div>
							<div class="text">
								<a href="javascript:;"><span>@Designer</span> things new illustration for &laquo;Cyfra&raquo;</a>
								<div class="date">5 days ago</div>
							</div>
						</li>
						<li>
							<div class="icon">
								<i class="fa fa-twitter"></i>
							</div>
							<div class="text">
								<a href="javascript:;"><span>@Designer</span> new design logo</a>
								<div class="date">13 days ago</div>
							</div>
						</li>
						<li>
							<div class="icon">
								<i class="fa fa-twitter"></i>
							</div>
							<div class="text">
								<a href="javascript:;"><span>@Designer</span> things logo for new Cyfra intertainments</a>
								<div class="date">13 days ago</div>
							</div>
						</li>
					</ul>
				
				</div>
			
			</aside>
			
		</div>
	</div>
	
	<!--
				
		PAGE FOOTER
					
	-->
	<footer id="footer" data-appear-animation="fadeIn">
	
		<!--
		
			FOOTER WIDGETS
			
		-->
		<div class="wrapper grid">
		
			<!--
				ABOUT US WIDGET
			-->
			<div class="unit one-quarter widget widget-about">
				<a href="javascript:;" class="footer-logo ib"><img src="images/logo-footer.png" width="146" height="36" alt="" /></a>
				
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. </p>
				
			</div>
			
			<!--
				CONTACT US WIDGET
			-->
			<div class="unit one-quarter widget widget-contact-us">
				
				<h4 class="widget-title">Contact us</h4>
				
				<form action="javascript:;" method="post">
					<fieldset>
						<p>
							<input type="text" name="" value="" placeholder="Your name" />
						</p>
						<p>
							<input type="email" name="" value="" placeholder="Email address" />
						</p>
						<p>
							<textarea name="" placeholder="Message"></textarea>
						</p>
						<p>
							<span class="captcha">
								2+2 = <input type="text" value="" />
							</span>
							<input type="submit" value="Send" />
						</p>
					</fieldset>
				</form>
				
			</div>
			
			<!--
				LATEST POSTS WIDGET
			-->
			<div class="unit one-quarter widget widget-latest-posts">
				
				<h4 class="widget-title">Latest posts</h4>
				
				<div class="item first">
					<a class="title" href="javascript:;">Some design blog post</a>
					<span class="date">14 May 2013</span> <a href="javascript:;" class="comments"> <i class="fa fa-comments-o"></i> <span class="comment-num ib">7</span></a>
				</div>
				
				<div class="item">
					<a class="title" href="javascript:;">WordPress code for responsive</a>
					<span class="date">13 May 2013</span> <a href="javascript:;" class="comments"> <i class="fa fa-comments-o"></i> <span class="comment-num ib">13</span></a>
				</div>
				
				<div class="item">
					<a class="title" href="javascript:;">Creative technologies of our time</a>
					<span class="date">7 May 2013</span> <a href="javascript:;" class="comments"> <i class="fa fa-comments-o"></i> <span class="comment-num ib">5</span></a>
				</div>
				
				<div class="item latest">
					<a class="title" href="javascript:;">Time for your site</a>
					<span class="date">21 June 2013</span> <a href="javascript:;" class="comments"> <i class="fa fa-comments-o"></i> <span class="comment-num ib">26</span></a>
				</div>
				
			</div>
			
			<!--
				RECENT PHOTOS WIDGET
			-->
			<div class="unit one-quarter widget widget-recent-photos">
				
				<h4 class="widget-title">Recent photos</h4>
				
				<a href="javascript:;"><img src="images/temp/footer_sample_1.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				<a href="javascript:;"><img src="images/temp/footer_sample_2.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				<a href="javascript:;"><img src="images/temp/footer_sample_3.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				<a href="javascript:;"><img src="images/temp/footer_sample_4.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				<a href="javascript:;"><img src="images/temp/footer_sample_5.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				<a href="javascript:;"><img src="images/temp/footer_sample_6.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				<a href="javascript:;"><img src="images/temp/footer_sample_7.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				<a href="javascript:;"><img src="images/temp/footer_sample_8.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				<a href="javascript:;" class="last"><img src="images/temp/footer_sample_9.jpg" width="87" height="87" alt="" /><span class="mask"><i class="fa zoom fa-search-plus"></i></span></a>
				
			</div>
		
		</div>
	
	</footer>
	
	<div id="primary-footer">
		<div class="wrapper grid">
			<div class="unit half">
				&copy; 2013 The GALAXY. All Rights Reserved 
			</div>
			<div class="unit half">
				<span class="social-icons">
					<a href="javascript:;"><i data-tip-gravity="s" title="Pinterest" class="fa fa-pinterest-square show-tooltip"></i></a> 
					<a href="javascript:;"><i data-tip-gravity="s" title="Facebook" class="fa fa-facebook-square show-tooltip"></i></a> 
					<a href="javascript:;"><i data-tip-gravity="s" title="Dribbble" class="fa fa-dribbble show-tooltip"></i></a> 
					<a href="javascript:;"><i data-tip-gravity="s" title="Linkedin" class="fa fa-linkedin-square show-tooltip"></i></a>
					<a href="javascript:;"><i data-tip-gravity="s" title="Twitter" class="fa fa-twitter-square show-tooltip"></i></a>
				</span>   
			</div>
		</div>
	</div>

	<!--
	
		STYLE SWITCHER
		
	-->
	<a href="javascript:;" id="style-switcher-opener"><i class="fa fa-cog"></i> <span class="text"></span></a>
	<div id="style-switcher">
		
		<div class="switcher-elements">
			<div class="inside">
				<div class="item">
			
					<a href="javascript:;" class="toggle">Color Schemes <i></i></a>
				
					<div class="inside">
					
						<div class="colors" id="skin-switcher">
					
							<a href="javascript:;" data-skin="blue" class="blue current"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="light-green" class="light-green"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="dark-green" class="dark-green"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="gray" class="gray"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="red" class="red"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="orange" class="orange"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="sky-blue" class="sky-blue"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="purple" class="purple"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="pink" class="pink"><i class="fa fa-check"></i></a>
							<a href="javascript:;" data-skin="brown" class="brown"><i class="fa fa-check"></i></a>
					
						</div>
					
					</div>
			
				</div>
			
				<div class="item">
			
					<a href="javascript:;" class="toggle">Boxed layout <i></i></a>
				
					<div class="inside">
					
						<div class="row" id="switcher-boxed-layout">
							<label class="inline-label"><input type="radio" value="yes" name="boxed_layout" /> Yes</label>
					
							<label class="inline-label"><input type="radio" value="no" name="boxed_layout" checked="checked" /> No</label>
						</div>
					
						<div class="row" id="switcher-background">
							<label class="block-label">Background:</label>
							<select id="switcher-background-selector">
								<option value="">Choose background...</option>
								<option value="background-1">Background 1</option>
								<option value="background-2">Background 2</option>
								<option value="background-3">Background 3</option>
								<option value="background-4">Background 4</option>
							</select>
						</div> 
					
						<div class="row" id="switcher-pattern">
							<label class="block-label">Pattern:</label>
							<select id="switcher-pattern-selector">
								<option value="">Choose pattern...</option>
								<option value="pattern-1">Carbon fibre</option>
								<option value="pattern-2">Cubes</option>
								<option value="pattern-3">Escheresque</option>
								<option value="pattern-4">Fabric of squares</option>
								<option value="pattern-5">Gray wash wall</option>
								<option value="pattern-6">Random grey variations</option>
								<option value="pattern-7">Wood</option>
								<option value="pattern-8">Material</option>
								<option value="pattern-9">Tileable wood</option>
								<option value="pattern-10">Tweed</option>
							</select>
						</div> 
					
					</div>
			
				</div>
			
				<div class="item">
			
					<a href="javascript:;" class="toggle">Header top menu <i></i></a>
				
					<div class="inside">
						<div class="row" id="switcher-header-top-menu">
							<label class="inline-label"><input type="radio" value="yes" name="header_top_menu" checked="checked" /> On</label>
					
							<label class="inline-label"><input type="radio" value="no" name="header_top_menu" /> Off</label>
						</div>
					</div>
			
				</div>
		
				<div class="item">
			
					<a href="javascript:;" class="toggle">Header layouts <i></i></a>
				
					<div class="inside" id="switcher-header-layout">
						<label class="row block-label">
							<input type="radio" name="header_layout" value="header-default" checked="checked" /> Default
						</label>
						<label class="row block-label">
							<input type="radio" name="header_layout" value="header-default-centered" /> Default centered
						</label>
						<label class="row block-label">
							<input type="radio" name="header_layout" value="header-big-background" /> Big background
						</label>
						<label class="row block-label">
							<input type="radio" name="header_layout" value="header-classic" /> Classic
						</label>
						<label class="row block-label">
							<input type="radio" name="header_layout" value="header-classic-centered" /> Classic centered
						</label>
						<label class="row block-label">
							<input type="radio" name="header_layout" value="header-full-width" /> Full width
						</label>
					</div>
			
				</div>
			
				<div class="item">
			
					<a href="javascript:;" class="toggle">Fonts <i></i></a>
				
					<div class="inside">
						<div class="row" id="switcher-primary-font">
							<label class="block-label">Primary font:</label>
							<select id="switcher-primary-font-selector">
								<option value="Roboto">Roboto</option>
								<option value="Roboto Slab">Roboto Slab</option>
							</select>
						</div> 
					
						<div class="row" id="switcher-secondary-font">
							<label class="block-label">Secondart:</label>
							<select id="switcher-secondary-font-selector">
								<option value="Roboto">Roboto</option>
								<option value="Roboto Slab">Roboto Slab</option>
							</select>
						</div> 
					
						<div class="row desc">
							* Fonts are used for example. You will be able to use 600+ google web fonts.
						</div>
					
					</div>
			
				</div>
			
				<div class="row last">
					<a href="javascript:;" id="switcher-reset-styles" class="button">Reset styles</a>
				</div>
		
			</div>
		
		</div>
		
	</div>

</div>
	<script src="{{ asset('public/guest/js/libs/nprogress.js') }}"></script>
	<script>
		NProgress.start();
	</script>
	<script src="{{ asset('public/guest/js/libs/jquery.tipsy.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.ui.totop.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.fs.scroller.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.fs.selecter.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.liquid-slider.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.touchSwipe.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.waitforimages.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.icheck.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.appear.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery-ui-1.10.3.custom.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/front.js') }}"></script>
	<!-- STYLE SWITCHER JS, YOU CAN REMOVE IT ALL AT REAL PROJECT -->
	<script src="{{ asset('public/guest/js/libs/jquery.cookie.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/jquery.mCustomScrollbar.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/less-1.5.1.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/styleSwitcher.js') }}"></script>

</body>
</html>