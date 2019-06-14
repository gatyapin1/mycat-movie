<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['movie_id', 'content'];

    public function Movie()
    {
      return $this->belongsTo('App\Movie');
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }
}
