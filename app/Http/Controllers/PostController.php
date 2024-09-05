<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
       return view('posts.index' , compact('posts'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'caption' => 'required|max:500|min:3',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $validated['image'] = "/images/$name";
        }
        $validated['user_id'] = auth()->id();
        Post::create($validated);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'caption' => 'required|max:500|min:3',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $validated['image'] = "/images/$name";
        }
        $post->update($validated);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
