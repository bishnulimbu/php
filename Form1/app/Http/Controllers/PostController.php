<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            // 'user_id'=>'required|exists:users,id',
            'body'=>'required|string|min:10',
            'is_published'=>'boolean',
            'slug'=>'nullable|string|unique:posts,slug'
        ]);
        $validated['slug']=$validated['slug']??Str::slug($validated['title']);
        $validated['user_id']=auth()->user()->id;
        
        Post::create(array_merge($validated));
        return redirect()->route('posts.index')->with('success','post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
