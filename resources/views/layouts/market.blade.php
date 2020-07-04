
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Final Project</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('boostrap/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>
<style>
  a{
      text-decoration: none!important;
      color: white!important;
  }
  .black{
      background-color: black!important;
  }
  .cart-image{
      width: 30px!important;
      height: 25px!important;
  }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  text-light shadow-sm black py-0">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
              Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon bg-white"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                   <ul class="navbar-nav ml-auto pt-1">

                    @if (Auth::check())
                      <div class="form-inline">
                          <?php
                                      $role_ids = json_decode('[' . Auth::user()->role->routes_ids . ']', true);
                                      $x =  sizeof($role_ids[0]);

                         ?>
                         @if ($x = 1)
                        <a href="/dashboard"><span class="mx-2 small">User Dashboard</span> </a>
                         @endif
                          <span class="pt-2">
                            <a href="/check-out">
                            <img src="{{asset('icons/shopping-cart.png')}}" alt="" class="cart-image" title="check-out">
                        </a></span>
                          @if($my_cart == null)
                          <span class="text-danger">0</span>
                          @else
                          <span class="text-danger">{{$my_cart}}</span>
                          @endif
                      </div>
                    @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register-customer" class="mx-2 ">Register</a></li>
                    @endif
                    <li>
                        <form action="/search-anything" method="post" >
                            @csrf
                        <div class="form-group">
                            <div class="row">

                                <div class="input-group-sm  ml-5"> <input type="text" class="form-control" name="search" required>
                        </div>

                          <div class="ml-2">    <button class="btn btn-primary btn-sm"><span class="mx-2 text-light">serach</span></button></div>

                       </div>
                        </div>
                        </form>
                    </li>
                </ul>

                </div>
            </div>
        </nav>

        <main class="black" >
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('boostrap/js/jquery.js')}}"></script>
    <script src="{{asset('boostrap/js/bootstrap.js')}}"></script>
   <script>
       $('#myLightbox').lightbox(options)
   </script>

</body>
</html>
