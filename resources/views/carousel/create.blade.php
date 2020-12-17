@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Carousel</div>

                <div class="card-body">
                @include('includes.error')
                    <form action="{{route('carousels.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                         <label for="name">Enter your name</label>
                         <input type="text" class="form-control" id="name" name="name">
                      </div>
                      <div class="form-group">
                         <label for="image">Choose image</label>
                         <input type="file" name="image" id="image" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="description">Enter description</label> 
                        <input type="text" name="description" class="form-control" id="description">
                       </div>
                      
                       <button type="submit" class="btn btn-sm btn-success">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection