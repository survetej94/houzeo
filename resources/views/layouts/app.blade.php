<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <style type="text/css">
           
        </style>
    </head>
    <body>
        @section('navbar')
               <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                  <a class="navbar-brand" href="#">Houzeo</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </div>
            </nav>
        @show

        <div class="container" style="margin-top: 90px;">
            @yield('content')
        </div>
         @section('footer')
       <!--  <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright © Your Houzeo 2021</p>
            </div>
        </footer>--->
        <script src="{{ url('public/js/3.2.1.jquery.min.js') }}" ></script>
            <script src="{{ url('js/bootstrap.bundle.js') }}" ></script>
        @show
    </body>
</html>