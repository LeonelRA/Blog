<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request){
        return view('search')->with([
            'posts' => Post::public()->where('title','like','%'.$request->search.'%')->latest()->paginate(8),
            'search' => $request->search,
            'type' => 'Searching'
        ]);
    }
}
