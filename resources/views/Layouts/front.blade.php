@extends('Layouts.common.base')

@section('title')
Front
@endsection

@section('vue')
<div id="header" class="row">
    <header-component></header-component>
</div>
<div id="contents" class="row">
    <router-view></router-view>
</div>
<div id="footer" class="row">
    <footer-component></footer-component>
</div>
@stop

@section('scripts')
@stop
