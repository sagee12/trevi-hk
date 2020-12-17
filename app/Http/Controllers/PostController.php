<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
            'name' => 'required'
        ]);
         $image = $request->image;
         $image_new = time().$image->getClientOriginalName();
         $image->move('uploads/',$image_new);


        $post = Post::create([
            'title' => $request->title,
            'name' => $request->name,
            'image' => 'uploads/'.$image_new,
            'content' => $request->content
        ]);

        session()->flash('success', 'New post created successfully.');
        return redirect(route('blog'));
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
    public function edit(Post $post)
    {
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'name' => 'required'
           
        ]);

        if(request()->hasFile('image')){
            $image = $request->image;
            $image_new = time().$image->getClientOriginalName();
            $image->move('uploads/',$image_new);
            $post->image = 'uploads/'.$image_new;
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'name' => $request->name
        ]);

        session()->flash('success', 'Post updated successfully.');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(file_exists($post->image)){
            unlink($post->image);
        }

        $post->delete();
        session()->flash('success', 'Post deleted successfully.');
        return redirect()->back();
    }

}
