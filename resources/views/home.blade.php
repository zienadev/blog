@extends('layouts.app')

@section('title', 'Post')

@section('content')

    <body>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class=" d-flex justify-content-end">
                    <a href={{ route('posts.create') }} class="btn btn-primary">Add New Post</a>
                </div>
            </div>
        </div>
        {{-- < !-- Start Navbar --> --}}
        {{-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <a href="#" class="navbar-brand">Blogs</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#menue">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menue">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Users</a>
                        </li>
                    </ul>
                </div>
            </div>


        </nav> --}}
        {{-- < !-- End Navbar --> --}}

        {{-- < !-- Start Content --> --}}

        <div class="content ">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-3 ">
                        <div class="categories shadow-lg">
                            <h4> All Blog Categories</h4>
                            <p class="post-info">
                                @foreach ($categories as $cat)
                                    <ul>
                                        <li>
                                            <a href="">
                                                <span><i class="fas fa-tags"></i></span> {{ $cat->name }} </span>
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        @foreach ($posts as $post)
                            <div class="post shadow-lg">
                                <div class="post-image">
                                    {{-- @if ($posts->isNotEmpty())
                                    @foreach ($posts as $post)
                                        @if ($post->image != '')
                                            <img width="100" src="{{ asset('images/' . $post->image) }}" alt="">
                                        @endif
                                    @endforeach
                                @endif --}}
                                    <img width="500" src="{{ asset('images/' . $post->image) }}" {{-- src="{{ asset('images/ciudades-universitarias-espana-1450x967 (1).jpg') }}" --}}
                                        alt="image-1">
                                </div>
                                <div class="post-title">
                                    <p class="post-info">
                                        <span><i class="fa fa-picture-o" aria-hidden="true"> <strong>ProfilePhoto :</strong>
                                                <img width="50" src="{{ asset('images/' . $post->user->image) }}"
                                                    {{-- src="{{ asset('images/codfe.png-1735473460.png') }}" --}} alt=""></i></span>
                                        <span><i class="fas fa-user"></i> <strong>UserName : </strong>
                                            {{ $post->user->name }}</span>
                                        {{-- <span><i class="far fa-calendar-alt"></i> <strong>BirthDate :</strong> 21-6-2004</span> --}}
                                        <span><i class="fas fa-tags"></i><strong> Post Category :</strong>
                                            {{ $post->category->name }}</span>
                                    <h4> {{ $post->title }}هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،</h4>

                                </div>
                                <div class="post-description">

                                    <p>
                                        {{ $post->description }}
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                        النص
                                        العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة
                                        عدد
                                        الحروف التى يولدها التطبيق.
                                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدية لتصميم
                                        الموقع.
                                    </p>


                                    <div class="post-info">
                                        </p>

                                        <p class="post-info">
                                            @foreach ($post->tags as $tag)
                                                <span><i class="fas fa-tags"></i>#{{ $tag->name }}</span>
                                            @endforeach
                                        </p>

                                        <b>Comments:</b>
                                        <p class="post-info">
                                            @foreach ($post->comments as $comment)
                                                <span><i class="fa fa-picture-o" aria-hidden="true"> <strong>
                                                        </strong>
                                                        <img width="30"
                                                            src="{{ asset('images/' . $comment->user->image) }}"
                                                            {{-- src="{{ asset('images/codfe.png-1735473460.png') }}"  --}} alt=""></i></span>
                                                <span><i class="fas fa-user"></i> <strong></strong>
                                                    {{ $comment->user->name }}</span>
                                                <br>
                                                <span><i class="fas fa-tags"></i> <strong>comment
                                                        :</strong>{{ $comment->content }} </span>
                                        </p>
                        @endforeach
                    </div>
                    <button class="btn btn-custom"> Read
                        more
                    </button>

                    {{-- <button class="btn btn-custom"> <a href="{{ route('show.homee', $post) }}">Read
                            more</a>
                    </button> --}}

                </div>
            </div>
            @endforeach
        </div>

        </div>
        </div>
        </div>

        {{-- < !-- End Content --> --}}

        <footer>
            <p>© Zeina. All right reserved , 2025</p>
        </footer>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="https://kit.fontawesome.com/03757ac844.js"></script>
    </body>
@endsection
