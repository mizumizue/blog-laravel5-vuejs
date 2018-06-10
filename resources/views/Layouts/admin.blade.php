@extends('Layouts.common.base')

@section('title')
Admin
@endsection

@section('vue')
<navbar-component></navbar-component>
<div class="container">
<router-view></router-view>
</div>
@stop

@section('scripts')
<!-- SimpleMDE -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
    const simplemde = new SimpleMDE({
        element: document.getElementById("editor"),
        forceSync: true
    });
</script>
@stop