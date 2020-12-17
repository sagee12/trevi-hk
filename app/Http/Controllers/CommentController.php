<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'content' => 'required'
        ]);
        $image = $request->image;
        $image_new = time().$image->getClientOriginalName();
        $image->move('uploads/',$image_new);

        $comment = Comment::create([
            'name' => $request->name,
            'image' => 'uploads/'.$image_new,
            'post_id' => $post->id,
            'content' => $request->content
             
        ]);
        session()->flash('success', 'Comment added successfully.');
        return redirect()->back();
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
    public function edit(Comment $comment)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required'
        ]);
        if(request()->hasFile('image')){
            $image = $request->image;
            $image_new = time().$image->getClientOriginalName();
            $image->move('uploads/',$image_new);
            $comment->image = 'uploads/'.$image_new;
        }
        $comment->update([
            'name' => $request->name,
            'content' => $request->content    
        ]);
        session()->flash('success', 'Comment added successfully.');
        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
    }
}
