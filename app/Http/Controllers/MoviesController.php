<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MoviesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $movies = Movie::orderBy('created_at', 'desc')->paginate(4);
            $is_movie = false;
            if (Storage::disk('local')->exists('public/mycat_movies/')) {
                $is_movie = true;
            }
            $likes_movies = $user->likes_movies()->orderBy('created_at', 'desc')->paginate(4);

            $likes_exist = false;
            if (count($likes_movies) > 0) {
                $likes_exist = True;
            }
            
            $data = [
                'user' => $user,
                'movies' => $movies,
                'is_movie' => $is_movie,
                'likes_movies' => $likes_movies,
                'likes_exist' => $likes_exist,
            ];
        }

        return view('welcome', $data);
        
    }
    
    public function create()
    {
        $movie = new Movie;

        return view('movies.create', [
            'movie' => $movie,
        ]);
    }
    
    public function store(MoviesRequest $request)
    {;
        
        $this->validate($request, [
            'title' => 'required|max:191',
            'detail' => 'required|max:191',
        ]);
        
        $file_name = $request->file('movie')->getClientOriginalName();
        $file_path = $request->file('movie')->storeAs('/public/mycat_movies' , $file_name);

        $request->user()->movies()->create([
            'title' => $request->title,
            'detail' => $request->detail,
            'user_id' => $request->user_id,
            'file_path' => $file_path,
            'file_name' => $file_name,
        ]);
     
        return back()->with('success', '新しい動画を登録しました' . $file_name);

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        if (\Auth::id() === $movie->user_id) {

            return view('movies.edit', [
                'movie' => $movie,
            ]);
        }
        
        return redirect('/');
    }
    
    
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'detail' => 'required|max:191'
        ]);
        
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->detail = $request->detail;
        $movie->user_id = \Auth::id();
        $movie->save();

        return redirect('/');
    }
    
    
    public function destroy($id)
    {
        $movie = \App\Movie::find($id);

        if (\Auth::id() === $movie->user_id) {
            $movie->delete();
        }

        return redirect('/');
    }
    
    public function __construct()
    {
      $this->middleware('auth', array('except' => 'index'));
    }

    public function show($id) {
        
        $movie = Movie::find($id);
        
        $movie = Movie::findOrFail($id); // findOrFail 見つからなかった時の例外処理
        $like = $movie->likes()->where('user_id', Auth::user()->id)->first();

        if (\Auth::id() === $movie->user_id) {
            return view('movies.show', [
                'movie' => $movie,
                'like' => $like
            ]);
        }

        return view('movies.show')->with(array('movie' => $movie, 'like' => $like));
    }
    
}