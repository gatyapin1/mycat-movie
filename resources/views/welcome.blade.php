@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-md-8">
                @if (Auth::id() == $user->id)
                    <div class="text-center">
                        {!! link_to_route('movies.create', '動画の投稿はこちら', [],  ['class' => 'btn btn-primary btn-lg']) !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
                @include('movies.movies', ['movies' => $movies])
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