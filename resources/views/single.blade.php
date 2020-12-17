@extends('layouts.front')
@section('content')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <a href="{{route('blog')}}"><h2>Blog : {{$posts->title}}</h2></a>
     
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container">

    <div class="row">

      <div class="col-lg-12 entries">

        <article class="entry entry-single" data-aos="fade-up">

          <div class="entry-img">
            <img src="{{asset($posts->image)}}" alt="" width="100%">
          </div>

          <h2 class="entry-title">
            {{$posts->title}}
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="icofont-user"></i> {{$posts->name}}</li>
              <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time datetime="2020-01-01">{{$posts->created_at->toformattedDateString()}}</time></li>
              <li class="d-flex align-items-center"><i class="icofont-comment"></i>{{$posts->comments->count()}} Comments</li>
            </ul>
          </div>

          <div class="entry-content">
            <p>
             {!!$posts->content!!}
            </p>
          </div>
        </article><!-- End blog entry -->


        <div class="blog-comments" data-aos="fade-up">

          <h4 class="comments-count">{{$posts->comments->count()}} Comments</h4>

    
     
      @foreach($posts->comments as $comment)
     <div id="comment-2" class="comment clearfix">
            <img src="{{asset($comment->image)}}" class="comment-img  float-left" alt="">
            <h5><a href="">{{$comment->name}}</a> </h5>
            <time datetime="2020-01-01">{{$comment->created_at->diffForHumans()}}</time>
            <p>
             {!!$comment->content!!}
            </p>
           
         
        
        
          @endforeach
        
    
  

          <div class="reply-form">
            <h4>Leave a Reply</h4>
            @include('includes.error')
            <form action="{{route('comments.store', $posts->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
              <div class="row">
                <div class="col-md-6 form-group">
                <label for="name">Enter your name</label>
                  <input name="name" id="name" type="text" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                <label for="email">Enter your email</label>
                  <input name="email"  id="email" type="text" class="form-control" >
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                  <label for="image">Select your profile image</label>
                  <input name="image" type="file" class="form-control" id="image">
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                <label for="content">Write your comment</label>
                  <textarea name="content"  id="content" class="form-control"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Post Comment</button>

            </form>

          </div>

        </div><!-- End blog comments -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection
