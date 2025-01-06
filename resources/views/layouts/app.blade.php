<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Blog</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menue">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menue">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('show.home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link">Posts</a>
                    </li>
                    @can('manageUser', Auth::user())
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tags.index') }}" class="nav-link">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">Users</a>
                        </li>
                    @endcan
                    <ul class="navbar-nav ml-auto">
                        {{-- <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="logout" class="btn btn-danger">
                </form> --}}
                        <form method="post" action="{{ route('logout') }}">
                            @method('post')
                            @csrf
                            <li class="nav-item">
                                <button class="nav-link" type="submit">Log out</button>
                            </li>
                        </form>
                    </ul>

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
