<?php

// Project routes 

// main
$router->get('', 'DashboardController@index');

// admin
$router->get('admin', 'AdminController@index');
$router->get('admin/login', 'AdminController@login');

$router->get('register', 'AdminController@create');
$router->post('register/store', 'AdminController@store');
$router->get('login', 'AdminController@login');
$router->post('login/session', 'AdminController@session');
$router->post('logout', 'AdminController@destroy');

// user
$router->get('users', 'UserController@index');
$router->get('users/view', 'UserController@show');
$router->get('users/edit', 'UserController@edit');
$router->post('users/update', 'UserController@update');
$router->post('users/delete', 'UserController@destroy');

// post
$router->get('posts', 'PostController@index');
$router->get('posts/create', 'PostController@create');
$router->get('posts/view', 'PostController@show');
$router->post('posts/store', 'PostController@store');
$router->get('posts/edit', 'PostController@edit');
$router->post('posts/update', 'PostController@update');
$router->post('posts/delete', 'PostController@destroy');

// category
$router->get('categories', 'CategoryController@index');
$router->get('categories/create', 'CategoryController@create');
$router->post('categories/store', 'CategoryController@store');
$router->get('categories/edit', 'CategoryController@edit');
$router->post('categories/update', 'CategoryController@update');
$router->post('categories/delete', 'CategoryController@destroy');

// author
$router->get('author', 'AuthorController@index');

// firm
$router->get('firm', 'FirmController@index');

// camera
$router->get('camera', 'CameraController@index');
$router->get('camera/card', 'CameraController@show');

// lens
$router->get('lens', 'LensController@index');
$router->get('lens/card', 'LensController@show');

// flash
$router->get('flash', 'FlashController@index');
$router->get('flash/card', 'FlashController@show');

// admin/main
$router->get('admin/main', 'AdminMainController@index');
$router->get('admin/main/create', 'AdminMainController@create');
$router->get('admin/main/view', 'AdminMainController@show');
$router->post('admin/main/store', 'AdminMainController@store');
$router->get('admin/main/edit', 'AdminMainController@edit');
$router->post('admin/main/update', 'AdminMainController@update');
$router->post('admin/main/delete', 'AdminMainController@destroy');

// admin/author
$router->get('admin/author', 'AdminAuthorController@index');
$router->get('admin/author/create', 'AdminAuthorController@create');
$router->get('admin/author/view', 'AdminAuthorController@show');
$router->post('admin/author/store', 'AdminAuthorController@store');
$router->get('admin/author/edit', 'AdminAuthorController@edit');
$router->post('admin/author/update', 'AdminAuthorController@update');
$router->post('admin/author/delete', 'AdminAuthorController@destroy');

// admin/firm
$router->get('admin/firm', 'AdminFirmController@index');
$router->get('admin/firm/create', 'AdminFirmController@create');
$router->get('admin/firm/view', 'AdminFirmController@show');
$router->post('admin/firm/store', 'AdminFirmController@store');
$router->get('admin/firm/edit', 'AdminFirmController@edit');
$router->post('admin/firm/update', 'AdminFirmController@update');
$router->post('admin/firm/delete', 'AdminFirmController@destroy');

// admin/camera
$router->get('admin/camera', 'AdminCameraController@index');
$router->get('admin/camera/create', 'AdminCameraController@create');
$router->get('admin/camera/view', 'AdminCameraController@show');
$router->post('admin/camera/store', 'AdminCameraController@store');
$router->get('admin/camera/edit', 'AdminCameraController@edit');
$router->post('admin/camera/update', 'AdminCameraController@update');
$router->post('admin/camera/delete', 'AdminCameraController@destroy');

// admin/lens
$router->get('admin/lens', 'AdminLensController@index');
$router->get('admin/lens/create', 'AdminLensController@create');
$router->get('admin/lens/view', 'AdminLensController@show');
$router->post('admin/lens/store', 'AdminLensController@store');
$router->get('admin/lens/edit', 'AdminLensController@edit');
$router->post('admin/lens/update', 'AdminLensController@update');
$router->post('admin/lens/delete', 'AdminLensController@destroy');

// admin/flash
$router->get('admin/flash', 'AdminFlashController@index');
$router->get('admin/flash/create', 'AdminFlashController@create');
$router->get('admin/flash/view', 'AdminFlashController@show');
$router->post('admin/flash/store', 'AdminFlashController@store');
$router->get('admin/flash/edit', 'AdminFlashController@edit');
$router->post('admin/flash/update', 'AdminFlashController@update');
$router->post('admin/flash/delete', 'AdminFlashController@destroy');

