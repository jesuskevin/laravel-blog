<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.posts.index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = new Post();

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $endPath = 'images/pictures/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($endPath, $fileName);
            $newPost->picture = $endPath . $fileName;
        }

        $newPost->title = $request->title;
        $newPost->category_id = $request->category_id;
        $newPost->content = $request->content;
        $newPost->author = $request->author;
        $newPost->save();

        return redirect()->back()->with('status', 'El post ha sido creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {
        $post = Post::find($postId);

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $endPath = 'images/pictures/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($endPath, $fileName);
            $post->picture = $endPath . $fileName;
        }

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->author = $request->author;
        $post->save();

        return redirect()->back()->with('status', 'El post ha sido actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();

        return redirect()->back()->with('status', 'El post ha sido eliminado exitosamente.');
    }
}
