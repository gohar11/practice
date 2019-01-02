@foreach($comments as $comment)

    <div class=" alert alert-danger">
        <div class="col-md-12">
            <p><strong>{{$comment->user->name}} commented at {{$comment->created_at}}</strong></p>
            <hr>
            <p>{{$comment->body}}</p>
        </div>
        <hr>
        <h4>Display Replies</h4>
        @include('partials._comments_loop', ['comments' => $comment->allReplies])
        <form method="post" action="{{route('reply.store')}}">
            @csrf
            <div class="form-group">
                <textarea name="body" class="form-control" placeholder="Reply"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply">
                <input type="hidden" name="parent_comment_id" value="{{$comment->id}}" >
                <input type="hidden" name="post_id" value="{{$comment->commentable_id}}" >
            </div>
        </form>
    </div>

@endforeach