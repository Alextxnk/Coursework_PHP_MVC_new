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

// lens
$router->get('lens', 'LensController@index');

// flash
$router->get('flash', 'FlashController@index');

// admin/main
$router->get('admin/main', 'AdminFirmController@index');
$router->get('admin/main/create', 'AdminFirmController@create');
$router->get('admin/main/view', 'AdminFirmController@show');
$router->post('admin/main/store', 'AdminFirmController@store');
$router->get('admin/main/edit', 'AdminFirmController@edit');
$router->post('admin/main/update', 'AdminFirmController@update');
$router->post('admin/main/delete', 'AdminFirmController@destroy');

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
