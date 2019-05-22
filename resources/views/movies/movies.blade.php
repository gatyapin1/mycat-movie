<ul class="list-unstyled">
    <div class="mt-3 border-bottom">
        <h5>投稿動画一覧</h5>
    </div>
    <div class="mb-3 media">
        <div class="row">
        @foreach ($movies as $movie)
            @if ($is_movie)
                <div class="mr-4 border-white">
                <tr><th><video src="{!!asset('storage/mycat_movies/' . $movie->file_name)!!}" controls width=250 height=200 poster=''></video>
                <tr><th><figcaption>{!! link_to_route('movies.show', nl2br(e($movie->title)), ['id' => $movie->id]) !!}</figcaption>
                </div>
            @endif
        @endforeach
        </div>
    </div>
</ul>