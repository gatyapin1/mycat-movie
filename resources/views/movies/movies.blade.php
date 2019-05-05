<ul class="list-unstyled">
        <div class=mb-4>
        <li class="media, row">
            <h5>動画一覧</h5>
            @foreach ($movies as $movie)
            <div class="media-body">
            @if ($is_movie)
            <div class="p-2 border-white">
            <video src="{!!asset('storage/mycat_movies/' . $movie->file_name)!!}" controls width=250 height=200 poster=''></video>
            <figcaption>{!! link_to_route('movies.show', nl2br(e($movie->title)), ['id' => $movie->id]) !!}</figcaption>
            </div>
            @endif
                    
            </div>
            @endforeach
        </li>
        </div>
        <div class=mb-4>
        <li class="media, row">
            <h5>お気に入り動画一覧</h5>
            @foreach ($movies as $movie)
            @endforeach
        </li>
        
        <p class=text-danger>開発中</p>
        </div>
</ul>



{{ $movies->render('pagination::bootstrap-4') }}