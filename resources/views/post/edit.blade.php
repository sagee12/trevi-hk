@extends('layouts.app')

@section('content')
@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                @include('includes.error')
                    <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                         <label for="title">Enter your title</label>
                         <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
                      </div>
                       <div class="form-group">
                          <img src="{{asset($post->image)}}" width="100%" height="300px" alt="">
                       </div>
                       <div class="form-group">
                         <label for="name">Enter Name</label>
                         <input type="text" class="form-control" id="name" name="name" value="{{$post->name}}">
                      </div>
                      <div class="form-group">
                         <label for="image">Choose image</label>
                         <input type="file" name="image" id="image" class="form-control">
                      </div>
                       <div class="form-group">
                         <label for="content">Enter your content</label>
                         <textarea name="content" id="content" class="form-control" cols="10" rows="4">{{$post->content}}</textarea>
                       </div>
                       <button type="submit" class="btn btn-sm btn-success">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection