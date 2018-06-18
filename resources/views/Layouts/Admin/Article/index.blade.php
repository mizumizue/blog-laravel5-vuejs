@extends('Layouts.Admin.app')

@section('contents')
<div id="ArticleIndex" class="index">
    <div class="row">
        <a href="/admin/article/create">{{ __('messages.Label.Create') }}</a>
    </div>
    <div class="row table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>{{ __('messages.Label.Title') }}</th>
                    <th>{{ __('messages.Label.Published') }}</th>
                    <th>{{ __('messages.Label.UpdatedAt') }}</th>
                    <th>{{ __('messages.Label.Operation') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->published ? '公開' : '非公開' }}</td>
                    <td>{{ $article->updated_at->format('Y/m/d H:i') }}</td>
                    <td>
                        <a href="/admin/article/edit/{{ $article->id }}">{{ __('messages.Label.Edit') }}</a>
                        <span> / </span>
                        <a href="/admin/article/destroy/{{ $article->id }}">{{ __('messages.Label.Delete') }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
