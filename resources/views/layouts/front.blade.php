<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TREVI(Tung Chung - project Discussions)</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('app/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('app/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('app/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('app/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('app/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('app/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('app/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('app/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('app/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('app/assets/css/style.css')}}" rel="stylesheet">
  
  <!-- =======================================================
  * Template Name: Flattern - v2.1.0
  * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ====================================================== -->
  <style>
	  .my-pic{
		  width: 42px;
		  height: 38px;
		  border-radius: 50%;
	  }
    
	  .my-pic:hover{
		  transform: scale(4.5);
	  }
    #header{
      background-color:	#E50914;
      
    }
    
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex my-2">
      <div class=" m-auto" >
        <h1><a href="{{route('blog')}}" class="text-white">Trevi(HK)
        </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>TREVI</span></strong>. All Rights Reserved 2020
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/ -->
          Designed with <a href="https://bootstrapmade.com/">BootstrapMade</a>
          Developded by&nbsp; <img src="{{asset('app/assets/img/5.jpg')}}"  alt="my pic" class="img-fluid my-pic" >&nbsp;<a href="">SAGAR GURUNG</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.twitter.com" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://www.linkedin.com/in/sagar-gurung-06797b181" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('app/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('app/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('app/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('app/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('app/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('app/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('app/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('app/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('app/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('app/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('js/toastr.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('app/assets/js/main.js')}}"></script>
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
  @yield('script')

</body>

</html>