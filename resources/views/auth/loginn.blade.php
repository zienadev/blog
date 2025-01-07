<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <section>

        <div class="container mt-5 pt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-6 col-sm-4 col-md-4-m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="text-center">
                                <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="70"
                                    height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>
                            </div>
                            <form class="form-control" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="password">

                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger"> {{ $errors->first('message') }}</div>
                                @endif
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-primary" value="login">Login </button>
                                </div>
                                <div class="text-center mb-5">
                                    <a href="{{ route('register') }}" class="nav-link">Don't have an acoount <strong>
                                            ! Sign up ?</strong>
                                    </a>
                                </div>
                            </form>
                            {{-- <form action="">
                                <div class="mb-3">
                                    <input class="form-control mu-3 py-2" type="email" name="email" id=""
                                        placeholder="enter your email">
                                </div>

                                <br>
                                <div class="mb-5">
                                    <input class="form-control mu-3 py-2" type="text" name="password" id=""
                                        placeholder="enter your password">
                                </div> --}}
                            {{-- <div class="text-center mb-3">
                                <button class="btn btn-primary">Login</button>
                                <br>
                            </div>
                            <div class="text-center mb-5">
                                <a href="#" class="nav-link">Already have an acoount?</a>
                            </div> --}}


                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
