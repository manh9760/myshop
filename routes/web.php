<?php

Route::group(['namespace'=>'Auth'], function () {
    Route::get('/redirect/{social}', 'SocialAuthController@redirect');
    Route::get('/callback/{social}', 'SocialAuthController@callback');
});

Route::group(['namespace'=>'Guest'], function () {
    Route::get('', 'ProductController@getProductList')->name('get.home');
    Route::get('danh-muc/{slug}', 'ProductController@getProductListByCategory')->name('get.product.list');
    Route::get('san-pham/{slug}', 'ProductController@getProductDetail')->name('get.product.detail');

    Route::post('danh-gia-san-pham', 'ReviewController@add')->name('post.reviewProduct');

    // ----------------------- Tài khoản --------------------------------------------------
    Route::get('dang-ky', 'AuthenticationController@getRegisterForm')->name('get.register');
    Route::post('dang-ky', 'AuthenticationController@register');
    Route::get('dang-nhap', 'AuthenticationController@getLoginForm')->name('get.login');
    Route::post('dang-nhap', 'AuthenticationController@login');
    Route::get('dang-xuat', 'AuthenticationController@logout')->name('get.logout');
    Route::get('quen-mat-khau', 'AuthenticationController@getLostPasswordForm')->name('get.lostPassword');
    Route::get('lay-mat-khau', 'AuthenticationController@resetPassword')->name('post.LostPassword');

    Route::get('tao-mat-khau-moi/{userId}', 'AuthenticationController@createPasswordForm')->name('get.user.createPassword');
    Route::get('luu-mat-khau-moi/{userId}', 'AuthenticationController@savePassword')->name('get.user.savePassword');

    Route::group(['prefix'=>'tai-khoan'], function () {
        Route::get('thong-tin/{id}', 'UserController@getInfo')->name('get.user.info');
        Route::get('kich-hoat/{id}', 'UserController@active')->name('get.user.active');

        Route::get('don-hang/{id}', 'UserController@getOrders')->name('get.user.order');
        Route::get('don-hang/xoa/{id}', 'UserController@deleteOrder')->name('get.user.deleteOrder');

        Route::get('danh-gia/{id}', 'UserController@getReviews')->name('get.user.review');
        Route::get('danh-gia/xoa/{id}', 'UserController@deleteReview')->name('get.user.deleteReview');

        Route::post('cap-nhat', 'UserController@updateInfo')->name('post.info');
    });

    // ----------------------- Giỏ hàng ------------------------------------------------
    Route::group(['prefix'=>'gio-hang'], function () {
        Route::get('', 'CartController@index')->name('get.cart.index');
	    Route::get('them-san-pham/{id}', 'CartController@add')->name('get.cart.add');
	    Route::get('cap-nhat/{id}', 'CartController@update')->name('get.cart.update');
	    Route::get('xoa-san-pham/{id}', 'CartController@delete')->name('get.cart.delete');

        Route::get('cap-nhat-ajax/{id}', 'CartController@updateAjax')->name('updateCartAjax');

	    Route::post('thanh-toan', 'CartController@pay')->name('post.cart.pay');

        // Load Tỉnh/Thành phố, Quận/Huyện,...
        Route::get('/ajax/', 'CartController@getLocation')->name('getLocationByAjax');
	});

    // ----------------------- Thanh toán ------------------------------------------------
    Route::post('don-hang', 'CartController@pay')->name('get.cart.items');
    Route::post('thanh-toan-online', 'CartController@getPaymentForm')->name('get.paymentForm');
    Route::get('xu-ly-online', 'CartController@handlePayment')->name('get.handlePayment');

    // ----------------------- Bài viết ------------------------------------------------
    Route::get('bai-viet', 'PostController@getPostList')->name('get.post_list');
    Route::get('bai-viet/{slug}', 'PostController@getPostDetail')->name('get.post_detail');
});

include 'admin_route.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
