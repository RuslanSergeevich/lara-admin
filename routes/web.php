<?php

Route::get('/admin', 'Admin\AdminControllerIndex@index');
Route::resource('/admin/pages', 'Admin\AdminControllerPages');
Route::resource('/admin/articles', 'Admin\AdminControllerArticles');
Route::resource('/admin/news', 'Admin\AdminControllerNews');
Route::resource('/admin/comments', 'Admin\AdminControllerComments');
Route::resource('/admin/boxes', 'Admin\AdminControllerBoxes');
Route::resource('/admin/galery', 'Admin\AdminControllerGalery');

Route::get('/home', 'HomeController@index');


Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

