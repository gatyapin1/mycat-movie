@extends('layouts.app')

@section('title', '動画の編集 - Mycat-Movies')

@section('content')

    <h1>動画の編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($movie, ['route' => ['movies.update', $movie->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::label('title', '動画のタイトル') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('detail', '詳細') !!}
                    {!! Form::textarea('detail', null, ['class' => 'form-control', 'row' => '5']) !!}
                </div>
 
                    {!! Form::submit('更新', ['class' => 'btn btn-light']) !!}
        
            {!! Form::close() !!}
        </div>
        
    </div>
@endsection