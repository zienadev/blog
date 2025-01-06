@extends('layouts.app')

@section('title', 'show user')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg bg-light my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">User Details </h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label h6">Name</label>
                            <input class="form-control  bg-light" type="text" value="{{ $user->name }}"
                                aria-label="readonly input example" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                value="{{ $user->email }}" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                value="{{ $user->password }}" readonly>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <labeImage for="formFileDisabled" class="form-label h6">Image</label>
                                <input class="form-control  bg-light" type="file" id="formFileDisabled" disabled>
                        </div>
                        @if ($user->image != '')
                            {{-- @foreach ($user->images as $image) --}}
                            {{-- <img src="{{ asset('/images/posts/' . $image) }}"> --}}
                            <img class="w-50 my-3" src="{{ asset('images/' . $user->image) }}" alt="">
                            {{-- @endforeach --}}
                        @endif
                    </div>

                    {{-- <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label h6">Is_admin</label>
                            <input type="text" name="is_admin" value="{{ $user->is_admin }}" class="form-control"
                                id="formGroupExampleInput" placeholder="Enter true/false" readonly>

                        </div> --}}

                    {{-- <div class="d-grid">
                            <button class="btn btn-lg btn-primary">Update</button>
                        </div> --}}
                </div>
                </form>
            </div>

        </div>
    </div>

@endsection
