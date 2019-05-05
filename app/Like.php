<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Like extends Model
{
    use CounterCache;

    public $counterCacheOptions = [
        'Movie' => [
            'field' => 'likes_count',
            'foreignKey' => 'movie_id'
        ]
    ];

    protected $fillable = ['user_id', 'movie_id'];

    public function Movie()
    {
      return $this->belongsTo('App\Movie');
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }

}