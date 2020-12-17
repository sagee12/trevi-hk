@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Comments</div>

                <div class="card-body">
                   <table class="table table-hover">
                     <thead>
                        <th>Images</th>
                        <th>Name</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach($comments as $comment)
                            <tr>
                               <td><img src="{{$comment->image}}"  width="50px" height="50px" style="border-radius:50%" alt=""></td>
                               <td>{{$comment->name}}</td>
                               <td><a href="{{route('comments.edit', $comment->id)}}">Edit</a> | 
                                 <form action="{{route('comments.destroy', $comment->id)}}" method="Post">
                                     @csrf
                                     @method('delete')
                                     <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                 </form>
                               </td>
                            </tr>
                        @endforeach
                     </tbody>
                   </table>
                </div>
            </div>

@endsection
