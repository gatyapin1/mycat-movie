@extends('layouts.app')

@section('title', $user->name . 'のページ - Mycat-Movies')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @include('movies.my_movies')
        </div>
    </div>
@endsection