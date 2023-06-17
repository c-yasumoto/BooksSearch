{{--
|  history.php
|   url:/history
|
|--}}

@extends('layout.base')
@section('pageTitle', '検索履歴一覧')

@section('pageCss')
@endsection


@section('pageContents')
<!-- START KEYWORD SHOW -->
<div class="content">
    <div class='is-flex is-flex-wrap-wrap buttons'>
        @foreach ($contents as $content)
        <a href="{{url('/history')}}/{{$content->key}}" class="button is-outlined is-medium">{{$content->key}}</a>
        @endforeach
    </div>
</div>
<!-- END KEYWORD SHOW -->
@endsection
