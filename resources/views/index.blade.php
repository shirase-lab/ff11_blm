@extends('layout.common')
@section('title', 'FF11黒魔マジックバースト')
@section('keywords', 'A,B,C')
@section('description', 'FF11 黒魔道士のマジックバーストダメージ計算です')
@section('pageCss')
<link href="/css/page.css" rel="stylesheet">
@endsection
 
@include('layout.head')
 
@include('layout.header')
@section('content')
    <p>{{ $hello }}</p>
    @foreach ($hello_array as $hello_word)
        {{ $hello_word }}<br>
    @endforeach
@endsection

@section('pageSub')
    <p>個別サイドバーの内容</p>
@endsection
 
@section('pageJs')
<script src="/js/page.js"></script>
@endsection
 
@include('layout.footer')