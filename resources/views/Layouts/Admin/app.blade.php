@extends('Layouts.Common.base')

@section('title')
{{ $siteSetting->title.' - Admin' }}
@endsection

@section('main')
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/admin">{{ $siteSetting->title }}</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/admin/article">Article</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    @section('contents')
    @show
</div>
@stop

@section('footer')
    @parent

    @section('copyright')
        {{ '© 2018 '.$siteSetting->domain }}
    @endsection
@stop
