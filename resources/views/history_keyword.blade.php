{{--
|  history_keyword.blade.php
|   url:/history/{keyword}
|
|--}}

@extends('layout.base')
@section('pageTitle', '検索履歴')

@section('pageCss')
<style>
    .card a {
        word-break: break-all;
    }
</style>
@endsection

@section('pageContents')
<div class="content">
    @if (empty($contents))
        <p>該当する検索履歴がありません</p>
    @else
        <!--START SEARCH WORD -->
        <p class="is-size-3">検索ワード：{{$contents->key}}</p>
        <p class="is-size-4">検索履歴<span class="is-size-6">(直近10件まで表示)</span></p>
        <div class="mb-6">
            <ul>
                @foreach ($dates as $date)
                <li>{{$date['created_at']->format('Y/m/d H:i')}}</li>
                @endforeach
            </ul>
        </div>
        <!--START SEARCH WORD -->
        <!-- START OUTCOME SHOW -->
        <p class="is-size-4">検索結果<span class="is-size-6">(直近1件の検索結果を表示)</span></p>
        @php
            $res = unserialize($contents->search_res);
        @endphp
        @foreach ($res as $item)
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
                    <h3 class='is-size-4'>{{$item['volumeInfo']['title']}}</h3>
                    <p class='is-size-5'>
                    @if (isset( $item['volumeInfo']['authors']))
                        @foreach ($item['volumeInfo']['authors'] as $author)
                            {{$author}}
                        @endforeach
                    @endif
                    </p>
                    <p class=''>{{isset( $item['volumeInfo']['description']) ? $item['volumeInfo']['description'] :''}}</p>
                    <a class='f border bg-white mb8' href='{{$item['volumeInfo']['infoLink']}}', target='_blank'><p class=''>{{$item['volumeInfo']['infoLink']}}</p></a>
                </div>
            </div>
        </div>
        @endforeach
        <!-- END OUTCOME SHOW -->
    @endif
</div>

@endsection
