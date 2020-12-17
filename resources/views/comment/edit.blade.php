@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Comment</div>

                <div class="card-body">
                    <form action="{{route('comments.update', $comment->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                         <label for="name">Enter your name</label>
                         <input type="text" class="form-control" id="name" name="name" value="{{$comment->name}}">
                      </div>
                       <div class="form-group">
                          <img src="{{asset($comment->image)}}" width="100%" height="300px" alt="">
                       </div>
                      
                      <div class="form-group">
                         <label for="image">Choose image</label>
                         <input type="file" name="image" id="image" class="form-control">
                      </div>
                       <div class="form-group">
                         <label for="content">Enter your content</label>
                         <textarea name="content" id="content" class="form-control" cols="10" rows="4">{{$comment->content}}</textarea>
                       </div>
                       <button type="submit" class="btn btn-sm btn-success">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection