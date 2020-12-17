@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Comment</div>

                <div class="card-body">
                    <form action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                         <label for="name">Enter name</label>
                         <input type="text" class="form-control" id="name" name="name">
                      </div>
                      <div class="form-group">
                         <label for="image">Choose image</label>
                         <input type="file" name="image" id="image" class="form-control">
                      </div>
                       <div class="form-group">
                         <label for="content">Enter Content</label>
                        <textarea name="content" id="content" cols="15" rows="5" class="form-control"></textarea>
                       </div>
                       <button type="submit" class="btn btn-sm btn-success">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection