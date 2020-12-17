<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TREVY WORKER'S GROUP</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin') }}">
                   Trevy Worker's Group
                </a>
                <a class="navbar-brand" href="{{route('blog')}}">Trevy site</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        <!--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                          --> 
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      @auth
        <div class="container">
         <div class="row justify-content-center">
          <div class="col-md-4">
          
            <main class="py-4">
            <ul class="list-group">
               <li class="list-group-item">
                  <a href="{{route('carousels.index')}}">Carousel</a>
               </li>
               <li class="list-group-item">
                  <a href="{{route('carousels.create')}}"> Create Carousel</a>
               </li>
               <li class="list-group-item">
                  <a href="{{route('teams.index')}}">Team</a>
               </li>
               <li class="list-group-item">
                  <a href="{{route('teams.create')}}"> Create Team</a>
               </li>
               <li class="list-group-item">
                  <a href="{{route('posts.index')}}">Posts</a>
               </li>
               <li class="list-group-item">
                  <a href="{{route('posts.create')}}"> Create Post</a>
               </li>
            </ul>
            </main>
          
          </div>
          <div class="col-md-8">
            <main class="py-4">
              @yield('content')
           </main>
          </div>
        </div>
        </div>
      @else
      <main class="py-4">
         @yield('content')
       </main>
      @endauth
       
   </div>
 </body>
 <script>
    $(document).ready(function() {
  $('#content').summernote();
});
 </script>
 <script>
        @if(session()->has('success'))
          toastr.success("{{session()->get('success')}}");
        @endif
        @if(session()->has('error'))
          toastr.error("{{session()->get('error')}}");
        @endif
        @if(session()->has('info'))
          toastr.info("{{session()->get('info')}}");
        @endif
     </script>

</html>
