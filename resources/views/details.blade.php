 @extends('layouts.app')

 @section('title', 'Post Details')

 @section('content')
     {{-- @foreach ($posts as $post)  --}}
     <div class="container">
         <div class="post-details">
             <img src="{{ asset('images/' . $post->image) }}" alt="Post Image">
             <h2>{{ $post->title }}</h2>
             <p>Posted by: {{ $user->name }}</p>
             <p>Category: {{ $post->category->name }}</p>
             <p>Description: {{ $post->description }}</p>
             <p>Tags: @foreach ($post->tags as $tag)
                     #{{ $tag->name }}
                 @endforeach
             </p>
             <h3>Comments:</h3>
             @foreach ($post->comments as $comment)
                 <div class="comment">
                     <img src="{{ asset('images/' . $comment->user->image) }}" alt="User Image">
                     <p>Comment by: {{ $comment->user->name }}</p>
                     <p>{{ $comment->content }}</p>
                 </div>
             @endforeach
         </div>
     </div>
     {{-- @endforeach  --}}
 @endsection
