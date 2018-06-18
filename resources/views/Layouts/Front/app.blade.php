@extends('Layouts.Common.base')

@section('title')
{{ $siteSetting->title }}
@endsection

@include('Layouts.Front.header')

@section('main')
<!-- vue -->
<div id="VueContent" class="container">
    <div id="Contents" class="row">
        <router-view></router-view>
    </div>
</div>
@stop

@section('footer')
    @parent

    @section('copyright')
        {{ '© 2018 '.$siteSetting->domain }}
    @endsection

    <!-- app.js -->
    <script src="{{ mix('js/app.js') }}"></script>
@stop
