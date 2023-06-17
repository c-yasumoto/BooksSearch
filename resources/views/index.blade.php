{{--
|  index.php
|  url:/
|
|--}}


@extends('layout.base')
@section('pageTitle', '書籍検索')

@section('pageCss')
<style>
    .card a {
        word-break: break-all;
    }
</style>
@endsection


@section('pageContents')

<!-- START SEARCH FOAM -->
<form id="searchForm" method="get" action="{{url('/')}}">
    <div class="field has-addons mb-6">
        <div class="control is-expanded">
            <input class="input" type="search" id="keyword" name="keyword" placeholder="吾輩は猫である" value="{{$keyword}}">
        </div>
        <div class="control">
            <button id="searchSubmit" class="button is-info">
            Search
            </a>
        </div>
    </div>
</form>
<!-- END SEARCH  FOAM -->
<!-- START OUTCOME SHOW -->
<div class="content">
    @if (!empty($res))
        @foreach ($res['items'] as $item)
        <div class='card mb-6'>
            <div class='card-content columns'>
                <div class='column is-2 has-text-centered'>
                    @if (isset($item['volumeInfo']['imageLinks']['smallThumbnail']))
                        <img src="{{$item['volumeInfo']['imageLinks']['smallThumbnail']}}"/>
                    @else
                        <img src="{{asset('/img/noimage_128×182.png')}}" alt="noimage"/>
                    @endif
                </div>
                <div class="column">
                    <h3 class='is-size-4'>{{isset($item['volumeInfo']['title']) ? $item['volumeInfo']['title'] :''}}</h3>
                    <p class='is-size-5'>
                    @if (isset( $item['volumeInfo']['authors']))
                        @foreach ($item['volumeInfo']['authors'] as $author)
                            {{$author}}
                        @endforeach
                    @endif
                    </p>
                    <p class=''>{{isset( $item['volumeInfo']['description']) ? $item['volumeInfo']['description'] :''}}</p>
                    @if (isset($item['volumeInfo']['infoLink']))
                        <a class='f border bg-white mb8' href='{{$item['volumeInfo']['infoLink']}}', target='_blank'><p class=''>{{$item['volumeInfo']['infoLink']}}</p></a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
<!-- END OUTCOME SHOW -->

@endsection
