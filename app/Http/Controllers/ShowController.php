<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(Post $post)
    {
        $posts = Post::all();
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        // $comments = Comment::where('post_id', $post->id)->get();
        $comments = Comment::all();
        // $comments = Post::with('comments')->find($post->id);
        return view('home', compact('posts', 'users', 'categories', 'tags', 'comments'));
    }

    public function showComments(Post $post)
    {
        // Load the post along with its comments
        $postWithComments = Comment::where('post_id', $post->id)->get();
        // $postWithComments = Comment::all();
        // $postWithComments = Post::with('comments')->find($post->id);
        // Pass the post with comments to a view for display
        return view('homee', compact('postWithComments'));
    }
}
