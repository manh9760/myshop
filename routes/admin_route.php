<?php

Route::group(['prefix' => 'laravel-filemanager'], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {
    Route::get('/', 'AdminController@home')->name('admin.index');

	Route::get('login', 'AuthenticationController@getLoginForm')->name('admin.login');
	Route::post('login', 'AuthenticationController@login');
	Route::get('logout', 'AuthenticationController@logout')->name('admin.logout');

	Route::group(['prefix'=>'category'], function () {
	    Route::get('', 'CategoryController@index')->name('admin.category.index');
	    Route::get('create', 'CategoryController@create')->name('admin.category.create');
	    Route::post('create', 'CategoryController@created');
	    Route::get('update/{id}', 'CategoryController@update')->name('admin.category.update');
	    Route::post('update/{id}', 'CategoryController@updated');
	    Route::get('active/{id}', 'CategoryController@active')->name('admin.category.active');
	    Route::get('delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
	});

	Route::group(['prefix'=>'keyword'], function () {
	    Route::get('', 'KeywordController@index')->name('admin.keyword.index');
	    Route::get('create', 'KeywordController@create')->name('admin.keyword.create');
	    Route::post('create', 'KeywordController@created');
	    Route::get('update/{id}', 'KeywordController@update')->name('admin.keyword.update');
	    Route::post('update/{id}', 'KeywordController@updated');
	    Route::get('hot/{id}', 'KeywordController@hot')->name('admin.keyword.hot');
	    Route::get('delete/{id}', 'KeywordController@delete')->name('admin.keyword.delete');
	});

	Route::group(['prefix'=>'attribute'], function () {
	    Route::get('', 'AttributeController@index')->name('admin.attribute.index');
	    Route::get('create', 'AttributeController@create')->name('admin.attribute.create');
	    Route::post('create', 'AttributeController@created');
	    Route::get('update/{id}', 'AttributeController@update')->name('admin.attribute.update');
	    Route::post('update/{id}', 'AttributeController@updated');
	    Route::get('hot/{id}', 'AttributeController@hot')->name('admin.attribute.hot');
	    Route::get('delete/{id}', 'AttributeController@delete')->name('admin.attribute.delete');
	});

	Route::group(['prefix'=>'product'], function () {
	    Route::get('', 'ProductController@index')->name('admin.product.index');
	    Route::get('create', 'ProductController@create')->name('admin.product.create');
	    Route::post('create', 'ProductController@created');
	    Route::get('update/{id}', 'ProductController@update')->name('admin.product.update');
	    Route::post('update/{id}', 'ProductController@updated');
	    Route::get('hot/{id}', 'ProductController@hot')->name('admin.product.hot');
	    Route::get('active/{id}', 'ProductController@active')->name('admin.product.active');
	    Route::get('delete/{id}', 'ProductController@delete')->name('admin.product.delete');

	    Route::post('ckeditor/upload', 'ProductController@upload')->name('ckeditor.upload');
	});

	Route::group(['prefix'=>'user'], function () {
	    Route::get('', 'UserController@index')->name('admin.user.index');
	    Route::get('create', 'UserController@create')->name('admin.user.create');
	    Route::post('create', 'UserController@created');
	    Route::get('update/{id}', 'UserController@update')->name('admin.user.update');
	    Route::post('update/{id}', 'UserController@updated');
	    Route::get('active/{id}', 'UserController@active')->name('admin.user.active');
	    Route::get('delete/{id}', 'UserController@delete')->name('admin.user.delete');
	});

	Route::group(['prefix'=>'transaction'], function () {
	    Route::get('', 'TransactionController@index')->name('admin.transaction.index');
	    Route::get('create', 'TransactionController@create')->name('admin.transaction.create');
	    Route::post('create', 'TransactionController@created');
	    Route::get('update/{id}', 'TransactionController@update')->name('admin.transaction.update');
	    Route::post('update/{id}', 'TransactionController@updated');
	    Route::get('detail/{id}', 'TransactionController@getTransactionDetail')->name('admin.transaction.detail');
	    Route::get('delete/{id}', 'TransactionController@delete')->name('admin.transaction.delete');
	    Route::get('delete-order/{id}', 'TransactionController@deleteOrder')->name('admin.transaction.deleteOrder');
	    Route::get('update-status/{status}/{id}', 'TransactionController@updateOrderStatus')->name('admin.transaction.updateOrderStatus');
	});

	Route::group(['prefix'=>'menu'], function () {
	    Route::get('', 'MenuController@index')->name('admin.menu.index');
	    Route::get('create', 'MenuController@create')->name('admin.menu.create');
	    Route::post('create', 'MenuController@created');
	    Route::get('update/{id}', 'MenuController@update')->name('admin.menu.update');
	    Route::post('update/{id}', 'MenuController@updated');
	    Route::get('status/{id}', 'MenuController@status')->name('admin.menu.status');
	    Route::get('delete/{id}', 'MenuController@delete')->name('admin.menu.delete');
	});

	Route::group(['prefix'=>'post'], function () {
	    Route::get('', 'PostController@index')->name('admin.post.index');
	    Route::get('create', 'PostController@create')->name('admin.post.create');
	    Route::post('create', 'PostController@created');
	    Route::get('update/{id}', 'PostController@update')->name('admin.post.update');
	    Route::post('update/{id}', 'PostController@updated');
	    Route::get('active/{id}', 'PostController@active')->name('admin.post.active');
	    Route::get('delete/{id}', 'PostController@delete')->name('admin.post.delete');
	});
});