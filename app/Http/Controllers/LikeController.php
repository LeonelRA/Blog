<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tables')->with([
            'type' => 'likes',
            'components' => Like::whereUserId(\Auth::id())->paginate(8),
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

        if ($request->json()) {

            return DB::transaction(function() use ($request){
                $post = Post::find($request->post);

                $post->likes()->create([
                    'user_id' => $request->user,
                ]);

                return response()->json([
                    'like' => Like::latest()->first()
                ]);
            });
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */

    public function destroy(Like $like)
    {
        return DB::transaction(function() use ($like){
            $like->delete();

            return response()->json([
                'like' => false
            ]);
            
        });
    }
}
