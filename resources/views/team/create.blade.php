@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Team Member</div>

                <div class="card-body">
                @include('includes.error')
                    <form action="{{route('teams.store')}}" method="POST" enctype="multipart/form-data">
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
                        <label for="position">Enter your position</label> 
                        <input type="text" name="position" class="form-control" id="position">
                       </div>
                       <div class="form-group">
                        <label for="facebook">Enter your facebook</label> 
                        <input type="text" name="facebook" class="form-control" id="facebook">
                       </div>
                       <div class="form-group">
                        <label for="instagram">Enter your instagram</label> 
                        <input type="text" name="instagram" class="form-control" id="instagram">
                       </div>
                       <div class="form-group">
                        <label for="twitter">Enter your twitter</label> 
                        <input type="text" name="twitter" class="form-control" id="twitter">
                       </div>
                       <div class="form-group">
                        <label for="facebook">Enter your linkedin</label> 
                        <input type="text" name="linkedin" class="form-control" id="linkedin">
                       </div>
                    
                    
                       <button type="submit" class="btn btn-sm btn-success">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection