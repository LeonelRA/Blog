<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tables')->with([
            'type' => 'comments',
            'components' => Comment::whereUserId(\Auth::id())->paginate(8),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        if ($request->json()) {
            return DB::transaction(function() use ($request){

                $user = \Auth::user();

                $user->comments()->create([
                    'post_id' => $request->post,
                    'text' => $request->text,
                    'comment_parent' => $request->reply
                ]);

                return response()->json([
                    'comment' => 'Comentaste desde json'
                 ]);

            });
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request,Comment $comment)
    {
        if ($request->json()) {
            return DB::transaction(function() use ($request,$comment){
                $comment->fill($request->validated());
                $comment->save();

                return response()->json([
                    'comment' => true,
                    'text' => $request->text
                ]);
            });
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        return DB::transaction(function() use ($comment){
            $comment->delete();

            return response()->json([
                'comment' => 'eliminado'
            ]);
        });
        
    }
}
