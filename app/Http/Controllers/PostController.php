<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|min:3',
            'content'     => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create($validated);

        return redirect()->back()->with('success', 'Post created successfully!');
    }
}
