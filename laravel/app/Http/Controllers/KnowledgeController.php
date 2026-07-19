<?php

namespace App\Http\Controllers;

use App\Models\Category;

class KnowledgeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        return view('knowledge.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('knowledge.show', compact('category'));
    }
}