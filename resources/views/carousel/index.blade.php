@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Carousels</div>

                <div class="card-body">
                   <table class="table table-hover">
                     <thead>
                        <th>Images</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                     @if($carousels->count()==0)
                         <td><h4 class="text-center">No any carousels</h4></td>
                     @else
                     @foreach($carousels as $carousel)
                            <tr>
                               <td><img src="{{$carousel->image}}"  width="50px" height="50px" style="border-radius:50%" alt=""></td>
                               <td>{{$carousel->name}}</td>
                               <td>{{$carousel->description}}</td>
                               <td><a href="{{route('carousels.edit', $carousel->id)}}">Edit</a> | 
                                 <form action="{{route('carousels.destroy', $carousel->id)}}" method="Post">
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
