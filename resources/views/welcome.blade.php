@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-sm-8 mb-3">
                {{-- 投稿作成ページへのリンク --}}
                {!! link_to_route('somerecords.create', '投稿', [], ['class' => 'btn btn-info']) !!}
            </div>
            <div class="col-sm-8 mb-0">
                <ul class="nav nav-tabs">
                <li class="nav-item"><a href="/" class="nav-link active">一覧</a></li>
            </div>
            <div class="col-sm-8 mb-0">
                {{-- 投稿一覧 --}}
                @include('somerecords.somerecords')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Somerecords</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-info']) !!}
            </div>
        </div>
    @endif
@endsection