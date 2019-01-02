@foreach($posts as $post)

    <div class="row alert alert-success">
        <div class="col-md-12">
            <h5>{{$post->title}}</h5>
            <p>{{$post->body}}</p>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{route('comment.store')}}">
                @csrf
                <div class="form-group">
                    <textarea name="body" class="form-control" placeholder="Comment"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Comment">
                    <input type="hidden" name="post_id" value="{{$post->id}}" >
                </div>
            </form>
            <hr>
            <h5>Display Comments</h5>
            @include('partials._comments_loop', ['comments' => $post->comments])
        </div>
    </div>

@endforeach