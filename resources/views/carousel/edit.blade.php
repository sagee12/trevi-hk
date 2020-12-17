@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Carousel</div>

                <div class="card-body">
                @include('includes.error')
                    <form action="{{route('carousels.update', $carousel->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                         <label for="name">Enter your name</label>
                         <input type="text" class="form-control" id="name" name="name" value="{{$carousel->name}}">
                      </div>
                       <div class="form-group">
                          <img src="{{asset($carousel->image)}}" width="100%" height="300px" alt="">
                       </div>
                      
                      <div class="form-group">
                         <label for="image">Choose image</label>
                         <input type="file" name="image" id="image" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="description">Enter description</label> 
                        <input type="text" name="description" class="form-control" value="{{$carousel->description}}" id="description">
                       </div>
                      
                       <button type="submit" class="btn btn-sm btn-success">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection