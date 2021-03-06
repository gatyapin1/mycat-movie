@extends('layouts.app')

@section('content')
        
    <div class="row">
        <div class="col-6">
            <h3><strong>{{ $movie->title }}</strong></h3>
            <video src="{!!asset('storage/mycat_movies/' . $movie->file_name)!!}" controls width=600 height=450 poster=''></video>
        </div>
    
        <div class="offset-1 col-5">
            <div class="card bg-light mb-3">
                <div class="card-header">
                    <img class="mr-2 rounded" src="{{ Gravatar::src($movie->user->email, 30) }}" alt="">
                    {!! link_to_route('users.show', $movie->user->name, ['id' => $movie->user->id]) !!} <span class="text-muted">投稿日時 {{ $movie->created_at }}</span>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $movie->detail }}</p>
                </div>
                <div class="card-footer">
                    <div class=row>
                        @if (Auth::check())
                        @if ($like)
                        {{ Form::model($movie, array('action' => array('LikesController@destroy', $movie->id, $like->id))) }}
                        <button type="submit">
                        <i class="fas fa-thumbs-up"></i> いいね！ {{ $movie->likes_count }}
                        </button>
                        {!! Form::close() !!}
                        @else
                        {{ Form::model($movie, array('action' => array('LikesController@store', $movie->id))) }}
                        <button type="submit">
                        <i class="far fa-thumbs-up"></i> いいね！ {{ $movie->likes_count }}
                        </button>
                        {!! Form::close() !!}
                        @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="field mb-2">
                @if (Auth::id() == $movie->user_id)
                {!! link_to_route('movies.edit', '動画を編集', ['id' => $movie->id], ['class' => 'btn btn-light']) !!}
            </div>
            <div>
                {!! Form::model($movie, ['route' => ['movies.destroy', $movie->id], 'method' => 'delete']) !!}
                    {!! Form::submit('動画を削除', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
    
    <div>
    <p></p>
    </div>
    
    <div class="row">
        <div class="col-6">
            @if (Auth::id() == $user->id)
                {{ Form::model($movie, array('action' => array('CommentsController@store', $movie->id))) }}
                    <div class="form-group">
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2', 'placeholder' => "公開コメントを記入"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('コメントを投稿', ['class' => 'btn btn-light']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
            @include('comments.index', ['user' => Auth::user()]) 
        </div>
    </div>
    
@endsection