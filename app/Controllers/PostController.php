<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Category;
use App\Validations\PostValidation;
use App\Validations\ImageValidation;
use App\Models\Post;
use App\Models\User;

class PostController
{
    // Show all posts 
    public function index()
    {
        $posts = ((new Post)->getPosts('posts'));
        $users = (new User)->allUser();

        return view('posts/index', [
            'posts' => $posts,
            'users' => $users
        ]);
    }

    // Show add post form 
    public function create()
    {
        $categories = (new Category)->allCategory('categories');
        return view('posts/create', ['categories' => $categories]);
    }

    // Show single post 
    public function show()
    {
        $post = ((new Post)->showPost(Request::values()['id']));

        return view('posts/show', ['post' => $post]);
    }

    // Store post
    public function store()
    {
        // Validate post 
        $data = ((new PostValidation)->validatePost(Request::values()));

        // Validate thumbnail
        $imgUrl = '';
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        if ($imgUrl) $imgUrl = $imgUrl;

        // Check if category select or not 
        if (!isset(Request::values()['category_id'])) {
            echo json_encode([
                'success'   => false,
                'message'   => 'Select category.'
            ]);
            return;
        }

        // Check before insert post 
        sesstionStart();
        if (sessionGet('username') == '') {
            echo json_encode([
                'success'   => false,
                'message'   => 'Login first to post!'
            ]);
            return;
        }

        // Get user 
        $userId = (new User)->getUser(sessionGet('username'));
        // Push user id 
        $data['user_id'] = $userId->id;

        // Send post data to store
        $lastPostId = $this->sendToStore($imgUrl, $data);

        // Send data to pivot table to insert 
        $category_id = Request::values()['category_id'];
        ((new Post)->sendToStoreCatPost($category_id, $lastPostId));

        // Success message 
        echo json_encode([
            'success'   => true,
            'message'   => 'Post added successfully.'
        ]);
    }

    // Send post data to post model to store
    protected function sendToStore($imgUrl, $data)
    {
        if ($imgUrl == '') {
            $data['thumbnail'] = 'public/assets/thumbnails/800x400.png';
            return ((new Post)->storePost('posts', $data));
        } else {
            $data['thumbnail'] = $imgUrl;
            return ((new Post)->storePost('posts', $data));
        }
    }

    // Show edit post form 
    public function edit()
    {
        $id = Request::values()['id'];

        // Show post 
        $post = ((new Post)->showPost($id));
        // Get all categories 
        $categories = (new Category)->allCategory('categories');
        // Get post related categories 
        $postCategories = (new Post)->getCategories($id);

        return view('posts/edit', [
            'post' => $post,
            'categories' => $categories,
            'postCategories' => $postCategories
        ]);
    }

    // Update post 
    public function update()
    {
        // Validate post 
        $data = ((new PostValidation)->validatePost(Request::values()));
        $postId = Request::values()['id'];
        $data['id'] = $postId;

        // Validate thumbnail 
        $imgUrl = ((new ImageValidation)->imgValidation(Request::file()['thumbnail']));
        $data['thumbnail'] = $imgUrl;

        // Check if category select or not 
        if (!isset(Request::values()['category_id'])) {
            echo json_encode([
                'success'   => false,
                'message'   => 'Select category!'
            ]);
            exit();
        }

        // Delete existing category from pivot table 
        $category_id = Request::values()['category_id'];
        (new Post)->deleteCatPost($category_id, $postId);

        // Get user 
        session_start();
        $userId = (new User)->getUser(sessionGet('username'));
        // Push user id 
        $data['user_id'] = $userId->id;
        ((new Post)->updatePost('posts', $data));

        // Store categories in pivot table 
        (new Post)->sendToStoreCatPost($category_id, $postId);

        // Success message 
        echo json_encode([
            'success'   => true,
            'message'   => 'Post updated successfully.'
        ]);
    }

    // Delete post 
    public function destroy()
    {
        ((new Post)->deletePost('posts', Request::values()['id']));

        redirect('posts');
    }
}
