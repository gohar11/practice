<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewPostNotification;

class HomeController extends Controller
{
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = new Post;
        $posts = $posts::where(['user_id' => Auth::id()])->get();
        return view('home', compact('posts'));
    }

    public function storePost(Request $request)
    {
        $category = Category::first()->where(['title' => 'sports'])->get();
        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->user_id = Auth::id();
        $post->save();
        $post->category()->attach($category);
        \Notification::send($request->user(), new NewPostNotification($post));
        return back();
    }

    public function storeComment(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('body');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);
        return back();
    }

    public function replyComment(Request $request)
    {

        $comment = new Comment;
        $comment->body = $request->get('body');
        $comment->parent_id = $request->get('parent_comment_id');
        $comment->user_id = Auth::id();
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);
        return back();
    }
}
