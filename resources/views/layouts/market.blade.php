
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>University Archieve</title>

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

                       <li><a href="/login">Login</a></li>
                       <li><a href="/register" class="mx-2 ">Register</a></li>
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
