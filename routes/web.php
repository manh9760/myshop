<?php

Route::group(['namespace'=>'Guest'], function () {
    Route::get('', 'ProductController@getProductList')->name('get.home');
    Route::get('danh-muc/{slug}', 'ProductController@getProductListByCategory')->name('get.product.list');
    Route::get('san-pham/{slug}', 'ProductController@getProductDetail')->name('get.product.detail');

    // ----------------------- Tài khoản --------------------------------------------------
    Route::get('dang-ky', 'AuthenticationController@getRegisterForm')->name('get.register');
    Route::post('dang-ky', 'AuthenticationController@register');
    Route::get('dang-nhap', 'AuthenticationController@getLoginForm')->name('get.login');
    Route::post('dang-nhap', 'AuthenticationController@login');
    Route::get('dang-xuat', 'AuthenticationController@logout')->name('get.logout');

    // ----------------------- Giỏ hàng ------------------------------------------------
    Route::group(['prefix'=>'gio-hang'], function () {
        Route::get('', 'CartController@index')->name('get.cart.index');
	    Route::get('them-san-pham/{id}', 'CartController@add')->name('get.cart.add');
	    Route::get('cap-nhat/{id}', 'CartController@update')->name('get.cart.update');
	    Route::get('xoa-san-pham/{id}', 'CartController@delete')->name('get.cart.delete');

	    Route::post('thanh-toan', 'CartController@pay')->name('post.cart.pay');

        // Load Tỉnh/Thành phố, Quận/Huyện,...
        Route::get('/ajax/', 'CartController@getLocation')->name('getLocationByAjax');
	});

    // ----------------------- Thanh toán ------------------------------------------------
    Route::post('don-hang', 'CartController@pay')->name('get.cart.items');

    // ----------------------- Bài viết ------------------------------------------------
    Route::get('bai-viet', 'PostController@getPostList')->name('get.post_list');
    Route::get('bai-viet/{slug}', 'PostController@getPostDetail')->name('get.post_detail');
});

include 'admin_route.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
