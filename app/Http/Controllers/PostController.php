<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except('show');

        $this->authorizeResource(Post::class, 'post');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('posts.index')->with([
            'posts' => Post::whereUserId(\Auth::id())->orderBy('published_at', 'desc')->paginate(8),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = $request->user();

        $post = $user->posts()->create([
            'title' => $request->title,
            'slug' => $request->title,
        ]);

        return redirect()->route('post.edit', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $next = Post::public()->where('published_at', '>', $post->published_at)->orderBy('published_at', 'asc')->first();
        $prev = Post::public()->where('published_at', '<', $post->published_at)->orderBy('published_at', 'desc')->first();

        return view('posts.show')->with([
            'post' => $post,
            'next' => $next,
            'prev' => $prev,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit')->with([
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        $post->fill($request->validated());

        $post->published_at = now();

        $post->category_id = Category::id($request->category);
        
        $post->status_id = Status::id($request->status);

        $post->save();

        $post->tags()->sync($request->tags);


        if ($request->hasFile('image')) {

            if ($post->image != null) {
                Storage::disk('images')->delete($post->image->path);
            }

            $post->image()->create([
                'path' => $request->image->store('posts', 'images'),
            ]);

        }

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->back();
    }
}
