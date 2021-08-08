<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        return view('tables')->with([
            'type' => 'posts',
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

        if(!Post::whereSlug(Str::slug($request->title,'_'))->exists()){
            $user = $request->user();

            $post = $user->posts()->create([
                'title' => $request->title,
                'slug' => $request->title,
                'published_at' => now()
            ]);

            return redirect()->route('post.edit', $post->slug);
        }

        return redirect()->back()->withErrors('The Title has already been taken.');

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
        $post->likes()->delete();

        $post->delete();

        return redirect()->back();
    }
}
