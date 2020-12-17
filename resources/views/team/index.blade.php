@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Teams</div>
                <div class="card-body">
                   <table class="table table-hover">
                     <thead>
                        <th>Images</th>
                        <th>Name</th>
                        <th>position</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                     @if($teams->count()==0)
                       <td><h4 class="text-center">No teams created</h4></td>
                     @else   @foreach($teams as $team)
                            <tr>
                               <td><img src="{{$team->image}}"  width="50px" height="50px" style="border-radius:50%" alt=""></td>
                               <td>{{$team->name}}</td>
                               <td>{{$team->position}}</td>
                               <td><a href="{{route('teams.edit', $team->id)}}">Edit</a> | 
                                 <form action="{{route('teams.destroy', $team->id)}}" method="Post">
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

@endsection
