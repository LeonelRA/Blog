<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tables')->with([
            'type' => 'categories',
            'components' => Category::all(),
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
        if(!Category::whereSlug(Str::slug($request->title,'_'))->exists()){

            Category::create([
                'name' => $request->title,
                'slug' => $request->title
            ]);

            return redirect()->back();
        }

        return redirect()->back()->withErrors('The Name has already been taken.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('search')->with([
            'search' => $category->name,
            'posts' => $category->posts()->public()->latest()->paginate(8),
            'type' => 'Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ($request->json()) {
            return DB::transaction(function() use ($request,$category){
                $category->fill($request->all());
                $category->save();

                return response()->json([
                    'validate' => true,
                    'name' => $request->name
                ]);
            });
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        return DB::transaction(function() use ($category){
            $category->delete();

            return response()->json([
                'validate' => true
            ]);
        });
    }
}
