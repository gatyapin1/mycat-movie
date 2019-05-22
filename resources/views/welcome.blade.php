@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
                @include('users.card', ['user' => Auth::user()])
            </aside>
            <div class="col-md-8">
                @if (Auth::id() == $user->id)
                    <div class="text-center mt-5 pt-5">
                        {!! link_to_route('movies.create', '動画の投稿はこちら', [],  ['class' => 'btn btn-primary btn-lg']) !!}
                    </div>
                @endif
            </div>
        </div>
        
            <div>
                @include('movies.movies', ['movies' => $movies])
                @include('users.likes', ['movies' => $movies])
            </div>
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Mycat-Movie</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection