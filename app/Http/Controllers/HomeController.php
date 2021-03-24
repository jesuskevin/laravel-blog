<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(6);
        $categories = Category::all();
        return view('posts', [
            'posts' => $posts,
            'categories' => $categories,

        ]);
    }

    public function post($id)
    {
        $post = Post::find($id);
        $lastPosts = Post::inRandomOrder()->latest()->take(3)->get();
        $entradasRelacionadas = Post::inRandomOrder()->where('category_id', $post->category->id)->latest()->take(3)->get();

        return view('post', [
            'post' => $post,
            'lastPost' => $lastPosts,
            'entradasRelacionadas' => $entradasRelacionadas,

        ]);
    }

    public function postByCategory($category){
        
        $category = Category::where('name', '=', $category)->first();
        $selectedCategory = $category->id;
        $posts = Post::where('category_id', '=', $category->id)->paginate(6);
        $categories = Category::all();

        return view('posts', [
            'categories' => $categories,
            'posts' => $posts,
            'selectedCategory' => $selectedCategory,

        ]);
    }
}
