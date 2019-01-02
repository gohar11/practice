@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @include('partials._posts_loop', ['posts' => $posts])
                        <hr>
                        <h4>Create Post</h4>
                    <form method="post" action="{{route('store')}}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" name="title" type="text" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Post" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
