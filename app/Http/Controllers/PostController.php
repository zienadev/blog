<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
// use Laravel\Pail\File;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);
        // $this->authorize("manageUser", User::class);
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
        ]);

        // Get the authenticated user
        $user = auth()->user();

        $imageName = null;
        if ($request->hasFile("image")) {
            $imageName = $request->file("image")->getClientOriginalName() . "-" . time() . "." .
                $request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("images/"), $imageName);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->category_id = $request->category_id;
        $post->user_id = $user->id; // Assign the user_id

        $post->save();

        // Attach tags if any
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route("show.home")->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        $comments = Comment::where('post_id', $post->id)->get();
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.update', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
        ]);


        $user = auth()->user();


        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = $user->id;


        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName() . "-" . time() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/'), $imageName);

            if ($post->image) {
                File::delete(public_path('images/' . $post->image));
            }
            $post->image = $imageName;
        }

        $post->save();


        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route("posts.index")->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        // if (auth()->Auth::user()->is_admin === true) {
        $post->delete();
        // delete image
        File::delete(public_path('images/' . $post->image));
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        // }
    }
    private function uploadImage($file)
    {
        $imageName = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/'), $imageName);
        return $imageName;
    }
}
