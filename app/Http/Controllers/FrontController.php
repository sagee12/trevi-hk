<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Team;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Comment2;

class FrontController extends Controller
{
   public function index(){
       return view('blog')->with('carousels', Carousel::all())
                          ->with('teams', Team::simplePaginate(6))
                          ->with('posts', Post::orderBy('created_at', 'desc')->simplePaginate(3));
   }

   public function single($id){
      
      return view('single')->with('posts', Post::find($id))
                           ->with('comments', Comment::find($id));
                           
   }
}
