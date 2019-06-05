<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment; // 追加
use App\User; // 追加
use App\Movie; // 追加

class CommentsController extends Controller
{
    public function index() //現状未使用
    {
        $data = [];
        if (\Auth::check()) {
            $movie = Movie::orderBy('id', 'desc')->paginate(10);
            $comments = $movie->comments()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'movie' => $movie,
                'comments' => $comments,
            ];
        }
        
        return view('MoviesController@show', $data);
    }
    
    public function store(Request $request, $movieId)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $request->user()->comments()->create([
            'content' => $request->content,
            'movie_id' => $movieId
          ]);

        $movie = Movie::findOrFail($movieId);

        return back();
    }
    
    public function destroy($movieId, $commentId)
    {
        $movie = Movie::findOrFail($movieId);
        $comment = Comment::find($commentId);

        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
        }

        return back();
    }
}
