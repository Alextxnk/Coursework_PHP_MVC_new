<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Category;
use App\Validations\CategoryValidation;

class CategoryController
{
    // Show categories 
    public function index()
    {
        $categories = (new Category)->allCategory('categories');

        return view('categories/index', ['categories' => $categories]);
    }

    // Add category form 
    public function create()
    {
        return view('categories/create');
    }

    // Store category 
    public function store()
    {
        // Validate category 
        $data = (new CategoryValidation)
            ->validateCategory(Request::values());

        // Send to store 
        (new Category)->storeCategory('categories', $data);

        // Success message 
        echo json_encode([
            'success'   => true,
            'message'   => 'Category added successfully.'
        ]);
    }

    // Edit category 
    public function edit()
    {
        $category = (new Category)->getCategory(
            Request::values()['id']
        );

        return view('categories/edit', ['category' => $category]);
    }

    // Update category 
    public function update()
    {
        // Validate category 
        $data = (new CategoryValidation)
            ->validateCategory(Request::values());
        // Push id 
        $data['id'] = Request::values()['id'];

        (new Category)->updateCategory($data);

        // Success message 
        echo json_encode([
            'success' => true,
            'message' => 'Category updated successfully!'
        ]);
    }

    // Delete category 
    public function destroy()
    {
        (new Category)->categoryDestroy(Request::values()['id']);

        redirect('categories');
    }
}
