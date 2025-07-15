<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function posts($category_id){
        $posts = Post::where('category_id', $category_id)->get();
        return view('categories.posts', ['posts'=> $posts]);
    }
}
