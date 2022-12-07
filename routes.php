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

// admin/author
$router->get('admin/author', 'AdminAuthorController@index');
$router->get('admin/author/create', 'AdminAuthorController@create');
$router->get('admin/author/view', 'AdminAuthorController@show');
$router->post('admin/author/store', 'AdminAuthorController@store');
$router->get('admin/author/edit', 'AdminAuthorController@edit');
$router->post('admin/author/update', 'AdminAuthorController@update');
$router->post('admin/author/delete', 'AdminAuthorController@destroy');
