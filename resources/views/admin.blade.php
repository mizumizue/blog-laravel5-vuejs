@extends('common.base')

@section('title')
Admin
@endsection

@section('vue')
@stop

@section('contents')
<textarea id="editor" name="name" rows="8" cols="40"></textarea>

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