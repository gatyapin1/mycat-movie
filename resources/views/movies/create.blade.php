@extends('layouts.app')

@section('title', 'アップロード - Mycat-Movies')

@section('content')

    <h1>動画のアップロード</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($movie, ['route' => 'movies.store', 'enctype' => 'multipart/form-data']) !!}
            
                <div class="form-group">
                    {!! Form::label('title', '動画のタイトル') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('detail', '詳細') !!}
                    {!! Form::textarea('detail', null, ['class' => 'form-control', 'row' => '5']) !!}
                </div>
       
                <div class="form-group">
                    {!! Form::file('movie')!!}
                </div>
                
                <div class="form-group">
                    {!! Form::submit('アップロードして公開', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
                
            {!! Form::close() !!}
        </div>
        
        <div class="col-6">
            @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
            @endif
        </div>
        
    </div>
@endsection