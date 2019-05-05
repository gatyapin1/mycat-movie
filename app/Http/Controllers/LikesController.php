<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Like;
use Auth;
use App\Movie;

class LikesController extends Controller
{
    public function store(Request $request, $movieId)
    {
        Like::create(
          array(
            'user_id' => Auth::user()->id,
            'movie_id' => $movieId
          )
        );

        $movie = Movie::findOrFail($movieId);

        return redirect()
             ->action('MoviesController@show', $movie->id);
    }

    public function destroy($movieId, $likeId) {
      $movie = Movie::findOrFail($movieId);
      $movie->like_by()->findOrFail($likeId)->delete();

      return redirect()
             ->action('MoviesController@show', $movie->id);
    }
}
