@extends('layouts.app')

@section('title', 'create user')

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Add New User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label h6">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="formGroupExampleInput" placeholder="Enter User Name" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                    value="{{ old('email') }}" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput3" class="form-label h6">Image</label>
                                <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                                    id="formGroupExampleInput3" placeholder="Choose Image" required multiple>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label h6">Is_admin</label>
                                <select name="is_admin" class="form-select" id="is_admin" required>
                                    <option value="">Select an option</option>
                                    <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>True</option>
                                    <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>False</option>
                                </select>
                                @error('is_admin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <button type="submit" class="btn btn-primary">Send</button>

                        </form>

                    </div>
                </div>
            </div>


        @endsection
