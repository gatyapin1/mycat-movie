@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="offset-1 col-md-3">
                @include('users.card', ['user' => Auth::user()])
            </aside>
            <div class="col-md-8">
                @if (Auth::id() == $user->id)
                    <div class="text-center mt-5 pt-5">
                        {!! link_to_route('movies.create', '動画のアップロードはこちら', [],  ['class' => 'btn btn-primary btn-lg']) !!}
                    </div>
                    <div class="text-center pt-5">
                        <botton class="btn btn-warning btn-lg">「いいね！」をMycatポイントに交換（実装中）</botton>
                    </div>
                @endif
            </div>
        </div>

            <div>
                @include('movies.movies')
                @include('users.likes')
            </div>
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Mycat-Movie</h1>
                {!! link_to_route('signup.get', '登録はこちら!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
@endsection