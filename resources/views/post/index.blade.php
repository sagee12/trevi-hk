@extends('layouts.app')

@section('content')
       @auth
            <div class="card">
                <div class="card-header">Posts</div>
                <div class="card-body">
                   <table class="table table-hover">
                     <thead>
                        <th>Images</th>
                        <th>Name</th>
                        <th>title</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        @if($posts->count()==0)
                           <td><h4 class="text-center">No posts yet</h4></td>
                        @else
                        @foreach($posts as $post)
                            <tr>
                               <td><img src="{{$post->image}}"  width="50px" height="50px" style="border-radius:50%" alt=""></td>
                               <td>{{$post->name}}</td>
                               <td>{{$post->title}}</td>
                               <td><a href="{{route('posts.edit', $post->id)}}">Edit</a> | 
                                 <form action="{{route('posts.destroy', $post->id)}}" method="Post">
                                     @csrf
                                     @method('delete')
                                     <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                 </form>
                               </td>
                            </tr>
                        @endforeach
                        @endif
                     </tbody>
                   </table>
                </div>
            </div>
  @endauth
@endsection
