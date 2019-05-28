<ul class="list-unstyled">
    <div class="mt-3 border-bottom">
        <h5>いいねを押した動画一覧 <span class="badge badge-secondary">{{ $count_likes_movies }}</span></h5>
    </div>
    <div class="mb-3 media">
        <div class='media-body row'>
        @foreach ($likes_movies as $movie)
        @if ($likes_exist)
            <div class="mr-4 border-white">
                <video src="{!!asset('storage/mycat_movies/' . $movie->file_name)!!}" controls width=250 height=200 poster=''></video>
                <figcaption>{!! link_to_route('movies.show', nl2br(e($movie->title)), ['id' => $movie->id]) !!}</figcaption>
            </div>
        @endif
        @endforeach
        </div>
    </div>
</ul>