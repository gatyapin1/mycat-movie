@extends('layouts.app')

@section('content')
        
        
    <h1>動画詳細ページ</h1>
    
    <div class="row">
    <div class="col-6">
    <table class="table table-bordered">
        <tr>
            <th>タイトル</th>
            <td>{{ $movie->title }}</td>
        </tr>
        <tr>
            <th>詳細</th></th>
            <td>{{ $movie->detail }}</td>
        </tr>
    </table>
    </div>
    <div class="offset-1 col-5">
        <video src="{!!asset('storage/mycat_movies/' . $movie->file_name)!!}" controls width=400 height=300 poster=''></video>
    </div>
    
    @if (Auth::check())
    @if ($like)
      {{ Form::model($movie, array('action' => array('LikesController@destroy', $movie->id, $like->id))) }}
        <button type="submit">
          <img src="{!!asset('storage/icon/good.jpeg')!!}">
          Like {{ $movie->likes_count }}
        </button>
      {!! Form::close() !!}
    @else
      {{ Form::model($movie, array('action' => array('LikesController@store', $movie->id))) }}
        <button type="submit">
          <img src="/images/icon_heart.svg">
          Like {{ $movie->likes_count }}
        </button>
      {!! Form::close() !!}
    @endif
  @endif
    
    </div>
    
    
    {!! link_to_route('movies.edit', 'この動画を編集', ['id' => $movie->id], ['class' => 'btn btn-light']) !!}

    {!! Form::model($movie, ['route' => ['movies.destroy', $movie->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
        
    </div>
    
@endsection