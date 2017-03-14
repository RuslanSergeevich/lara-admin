<?php

Route::get('/admin', 'Admin\AdminControllerIndex@index');
Route::resource('/admin/pages', 'Admin\AdminControllerPages');
Route::resource('/admin/articles', 'Admin\AdminControllerArticles');
Route::resource('/admin/news', 'Admin\AdminControllerNews');
Route::resource('/admin/comments', 'Admin\AdminControllerComments');
Route::resource('/admin/boxes', 'Admin\AdminControllerBoxes');
Route::resource('/admin/menu', 'Admin\AdminControllerMenu');
Route::post('/admin/gallery/edit_image', 'Admin\AdminControllerGallery@edit_image');
Route::post('/admin/gallery/delete_image', 'Admin\AdminControllerGallery@delete_image');
Route::post('/admin/gallery/{id}/addphoto', 'Admin\AdminControllerGallery@addphoto');
Route::resource('/admin/gallery', 'Admin\AdminControllerGallery');
Route::resource('/admin/modules', 'Admin\AdminModulesController');
Route::resource('/admin/settings', 'Admin\AdminControllerSettings');
Route::post('/admin/settings/save_settings', 'Admin\AdminControllerSettings@save_settings');


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

