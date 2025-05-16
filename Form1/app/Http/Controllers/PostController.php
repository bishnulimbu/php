<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //will define 3 different methods for different users
    private function getPosts(){
        if
        (auth()->check() && auth()->user()->is_admin){
        return Post::with('images')->latest()->paginate();
        }else{
        return Post::with('images')
                    ->where('user_id',auth()->id())
                    ->latest()
                    ->paginate(6);
        }
    } 

    public function adminIndex(){
        $posts= $this->getPosts();
        return view('posts.admin',compact('posts'));
    }

    public function index()
    {
        // $posts=Post::with(['images'=>function($query){
        //     $query->latest()->limit(3);
        // }])->latest()->paginate(6);
        // $posts= $this->getPosts();
        $posts=Post::with('images')->where('is_published',true)->latest()->paginate(6);
        return view('posts.index',compact('posts'));
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
        // $request->merge([
        //     'is_published'=>$request->has('is_published')?true:false,
        // ]);
        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            'body'=>'required|string|min:10',
            'is_published'=>'boolean',
            'slug'=>'nullable|string|unique:posts,slug',
            'images.*'=>'image|mimes:jpeg,png,jpg,svg,gif,webp|max:10000'
        ]);
        $validated['slug']=$validated['slug']??Str::slug($validated['title']);
        $validated['user_id']=auth()->id();

        $post =Post::create($validated);
        $this->uploadImages($request,$post);

        
        return redirect()->route('posts.index')->with('success','post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Post $post)
    {
        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            'body'=>'required|string|min:10',
            'is_published'=>'boolean',
            'slug'=>['nullable','string',Rule::unique('posts','slug')->ignore($post->id)],
            'images.*'=>'image|mimes:jpeg,png,jpg,svg,gif,webp|max:10000'
        ]);
        $validated['slug']=$validated['slug']??Str::slug($validated['title']);

        $post->update($validated);
        $this->uploadImages($request,$post);//reusing code
        
        // dd($post);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        Storage::disk('public')->deleteDirectory("posts/{$post->id}");
        return redirect()->route('admin')->with('success','Post deleted successfully');
    }

    private function uploadImages(Request $request,Post $post){
        if($request->hasFile('images')){
            foreach($request->file('images') as $imageFile){
                 $fileName = Str::random(20) . '_' . $imageFile->getClientOriginalName();
                // Store the file
                $filePath = $imageFile->storeAs('posts/' . $post->id, $fileName, 'public');
                Image::create([
                    'post_id'=>$post->id,
                    'image_path'=>$filePath
                ]);
            }
        }
    }
}
