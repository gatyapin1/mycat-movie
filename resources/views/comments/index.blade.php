<ul class="media-list">
    @foreach ($comments as $comment)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($comment->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $comment->user->name, ['id' => $comment->user->id]) !!} <span class="text-muted"> {{ $comment->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($comment->content)) !!}</p>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        @if (Auth::id() == $comment->user_id)
                            {{ Form::model($movie, array('action' => array('CommentsController@destroy', $movie->id, $comment->id), 'method' => 'delete')) }}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $comments->render('pagination::bootstrap-4') }}