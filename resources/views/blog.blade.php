@extends('layouts.front')

@section('content')

        

 <!-- ======= Hero Section ======= -->
 <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">
    
  
      @foreach($carousels as $carousel)
      <div class="carousel-item" style="background-image: url({{$carousel->image}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp ">
              <h2 class="text-center">{{$carousel->name}}</span></h2>
              <p>{{$carousel->description}}</p>
            </div>
          </div>
        </div>
      @endforeach
       
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->


  <main id="main">
     <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Coming together is a beginning, Staying together is progress and Working together is success. </p>
        </div>

        <div class="row">
            
          @foreach($teams as $team)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
             
              <div class="member-img">
                <img src="{{$team->image}}" width="100%" height="300px" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{$team->name}}</h4>
                <span>{{$team->position}}</span>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </section><!-- End Our Team Section -->
     <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
           
          <div class="col-lg-12 entries">
           <h2 class="text-center">Write <strong>Something New</strong>
           <a href="{{route('posts.create')}}"><button class="btn btn-danger btn-sm float-right">Add blog</button></a></h2><br>
           @foreach($posts as $post)
            <article class="entry" data-aos="fade-up">
              <div class="entry-img">
                <img src="{{asset($post->image)}}" alt="" width="100%">
              </div>
              <h2 class="entry-title">
                <a href="{{route('blog.single', $post->id)}}">{{$post->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i>{{$post->name}}</li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time datetime="2020-01-01">{{$post->created_at->toformattedDateString()}}</time></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i>{{$post->comments->count()}} comments</li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
               {!!Str::limit($post->content, 500)!!}
                </p>
                <div class="read-more">
                  <a href="{{route('blog.single', $post->id)}}">Read More</a>
                </div>
              </div>
            </article><!-- End blog entry -->
            @endforeach
           <div class="float-right">
           {{$posts->links()}}
           </div>
          </div><!-- End blog entries list -->
         
        </div>

      </div>
    </section><!-- End Blog Section -->
    
    
  </main><!-- End #main -->

@endsection
@section('script')
  <script>
      $('.carousel-item').first().addClass('active');
  </script>
@endsection
