@if ($count_my_movies > 0)
    <ul class="list-unstyled">
    @foreach ($my_movies as $movie)
        <li class="media">
            <div class="offset-1 col-5 mr-2 border-white">
                <video src="{!!asset('storage/mycat_movies/' . $movie->file_name)!!}" controls width=250 height=200 poster=''></video>
            </div>
            <div class="col-6 mb-2 border-white">
                <figcaption>{!! link_to_route('movies.show', nl2br(e($movie->title)), ['id' => $movie->id]) !!}</figcaption>
                <div class="text-muted">
                    投稿日時 {{ $movie->created_at }}
                </div>
                <button>
                    <i class="fas fa-thumbs-up"></i> いいね！ {{ $movie->likes_count }}
                </button>
            </div>
        </li>
    @endforeach
    </ul>
{{ $my_movies->render('pagination::bootstrap-4') }}
@endif