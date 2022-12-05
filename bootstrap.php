<?php

use App\Core\{App, Request, Router};

use Database\Migrations\{
    CreateCategoriesTable,
    CreateCategoryPostTable,
    CreateUsersTable,
    CreatePostsTable
};

App::bind('config', require 'config.php');

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());

// Create table if not exists 
CreateUsersTable::userTable('users');
CreatePostsTable::postTable('posts');
CreateCategoriesTable::categoriesTable('categories');
CreateCategoryPostTable::categoryPostTable('category_post');
