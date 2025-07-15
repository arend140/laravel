<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->get();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create(){
        $categories = Category::all();
        return view('posts.create', ['categories'=> $categories]);
    }

    public function edit(Post $post, Request $request){
        if ($request->isMethod('put')){
            $post = Post::find($request->id);
            $post->fill($request->all());
            $post->save();

            return redirect()->route('posts');
        }

        return view('posts.edit', ['post' => $post]);
    }

    public function store(Request $request){
        Post::create($request->all());
        return redirect()->route('posts');
    }
}
