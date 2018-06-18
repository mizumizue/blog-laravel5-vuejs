<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- app.css -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
    </head>
    <body>
        @section('header')
        @show
        @section('main')
        @show
        @section('footer')
          <footer class="col-12 col-sm-12 col-md-12 text-center">@yield('copyright')</footer>
        @show
    </body>
</html>
