@extends('layouts.app')

@section('content')

    <h1>動画投稿ページ</h1>

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
                    {!! Form::file('movie') !!}
                </div>
 
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
        
            {!! Form::close() !!}
        </div>
        
        
        <div class="col-6">
            @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
            @endif
            
            @if ($errors->any())
             <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        
    </div>
@endsection