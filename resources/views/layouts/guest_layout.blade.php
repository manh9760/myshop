<!DOCTYPE html>
<html class="no-js" lang="en-US">
<head>
	<meta charset="UTF-8" />
	<title>
		@if(isset($pageTitle))
			{{$pageTitle}}
		@else
			Linh kiện máy tính
		@endif
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="icon" href="{{ asset('public/guest/images/logos/logo-icon.png') }}" />
	
	<link rel="stylesheet" title="blue" href="{{ asset('public/guest/css/skin-blue.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" id="font-awesome-css" href="{{ asset('public/guest/css/libs/font-awesome/css/font-awesome.min.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" id="magnific-popup-css" href="{{ asset('public/guest/css/libs/magnific-popup.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" id="animate-css" href="{{ asset('public/guest/css/libs/animate.min.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('public/guest/css/libs/liquid-slider.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('public/guest/css/libs/owl.carousel.css') }}" type="text/css" media="all" />

	<link href="{{ asset('public/guest/webfonts/fonts-googleapis-com.css') }}" rel="stylesheet" type="text/css" />
	<script src="{{ asset('public/guest/js/libs/jquery-1.10.2.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/retina-1.1.0.min.js') }}"></script>

	<!-- Các file css thêm -->
	@yield('css')

	<!-- Xử lý thông báo -->
	<link href="{{asset('public/guest/toastr/toastr.min.css')}}" rel="stylesheet">
	@if(session('toastr'))
		<script type="text/javascript">
			var TYPE = "{{session('toastr.type')}}";
			var MESSAGE = "{{session('toastr.message')}}";
		</script>
	@endif
</head>

<body class="widgetized-footer {{ isset($bodyClass) ? $bodyClass : 'post-type-archive-product' }}">
	<div class="primary-wrapper">
		@include('guest._components.header')

		<!-- Phần nội dung chính -->
		@yield('content')
		
		@include('guest._components.footer')
	</div>

	<script src="{{ asset('public/guest/js/libs/nprogress.js') }}"></script>
	<script>
		NProgress.start();
	</script>
	<script src="{{ asset('public/guest/js/libs/jquery.tipsy.js') }}"></script>
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
	<script src="{{ asset('public/guest/js/libs/masonry.pkgd.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/libs/idangerous.swiper-2.4.min.js') }}"></script>
	<script src="{{ asset('public/guest/js/front.js') }}"></script>

	<!-- Thông báo -->
	<script src="{{asset('public/guest/toastr/toastr.min.js')}}"></script>
	<script type="text/javascript">
		if (typeof TYPE != 'undefined') {
			switch (TYPE) {
				case 'success':
					toastr.success(MESSAGE);
					break;
				case 'info':
					toastr.info(MESSAGE);
					break;
				case 'warning':
					toastr.warning(MESSAGE);
					break;
				case 'error':
					toastr.error(MESSAGE);
					break;
			}
		}
	</script>

	<!-- Chat Facebook -->
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
		  FB.init({
		    xfbml: true,
		    version: 'v8.0'
		  });
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<div class="fb-customerchat" attribution=setup_tool page_id="104284044828398" theme_color="#ff7e29"
		logged_in_greeting="Chào mừng bạn đến với Cửa hàng Linh kiện máy tinh Văn Mạnh!!!"
		logged_out_greeting="Chào mừng bạn đến với Cửa hàng Linh kiện máy tinh Văn Mạnh!!!">
	</div>

	<!-- Các file js thêm -->
	@yield('script')
</body>
</html>