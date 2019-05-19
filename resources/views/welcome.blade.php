<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Landing PAGE Html5 Template">

    <meta name="keywords" content="landing,startup,flat">


    <title>Landing Page</title>



    <!-- // PLUGINS (css files) // -->
    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">

    <link href="{!! asset('css/main.css') !!}" rel="stylesheet">

</head>



<body>



<nav class="navbar navbar-default">
   <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">SIPARTUS</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
            <li><a href="#about">Petunjuk</a></li>
            <li><a href="#about">Tentang</a></li>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
            @endif
         </ul>
      </div>
      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container-fluid -->
</nav>


    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <!-- Introduction -->

                <div class="col-md-6 caption">

                    <h2>Selamat Datang di SIPARTUS</h2>
                    <img src="{!! asset('img/abortus.jpg') !!}" alt="abortus">

                    <p>Abortus Adalah Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam iure unde dolore dolor officia distinctio perspiciatis, error expedita? Officiis magnam at qui dolores placeat, voluptate asperiores accusamus alias nemo in.</p>

                </div>

                <!-- Sign Up -->

                <div class="col-md-5 col-md-offset-1">

                <form method="POST" action="{{ route('register') }}" class="signup-form">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </section>




    <!--======================================== 

           Footer

    ========================================-->



    <footer>

        <div class="container">

            <div class="row">

                <div class="footer-caption">

                    <img src="{!! asset('img/logo.png') !!}" class="img-responsive center-block" alt="logo">

                    <hr>

                    <h5 class="center-block">Basomalang, &copy;2019 All rights reserved</h5>
                </div>

            </div>

        </div>

    </footer>



    <!--======================================== 

           Modal

    ========================================-->



    <!-- Modal -->

    <div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title text-center" id="myModalLabel">Sign In</h4>

                </div>

                <div class="modal-body">

                    <form action="login.php?op=in" class="signup-form" method="post">

                        <div class="form-group">

                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required">

                        </div>

                        <div class="form-group">

                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" name="login" class="btn btn-blue btn-block">Log In</button>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/main.js"></script>

</body>



</html>