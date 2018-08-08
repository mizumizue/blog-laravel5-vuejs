<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- SEO -->
        <meta name="description" content="{{ $siteSetting->description }}">
        <meta name="keywords" content="{{ $siteSetting->keywords }}">
        <!-- OGP -->
        <meta property="og:title" content="{{ $siteSetting->title  }}">
        <meta property="og:url" content="{{ $siteSetting->url  }}">
        <meta property="og:image" content="">
        <meta property="og:site_name" content="{{ $siteSetting->title }}">
        <meta property="og:description" content="{{ $siteSetting->description }}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $siteSetting->title }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- app.css -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div id="app">
        </div>

        <!-- app.js -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- SimpleMDE -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <!-- Marked -->
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    </body>
</html>
