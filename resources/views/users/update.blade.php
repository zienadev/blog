@extends('layouts.app')

@section('title', 'edit user')

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
                        <h3 class="text-white">Edit User</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" id="formGroupExampleInput"
                                    class="form-label h6 ">Name</label>
                                <input class="form-control" value="{{ old('name', $user->name) }}" type="text"
                                    name="name">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                    value="{{ old('email', $user->email) }}" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                    value="{{ old('password'), $user->password }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput3" class="form-label h6">Image</label>
                                <input type="file" id="formGroupExampleInput3" class="form-control form-control-sm"
                                    placeholder="image" name="image">
                                @if ($user->image != '')
                                    <img class="w-50 my-3" src="{{ asset('images/' . $user->image) }}" alt="">
                                @endif
                            </div>

                            {{-- <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label h6">Is_admin</label>
                                <input type="text" name="is_admin" value="{{ old('is_admin', $user->is_admin) }}"
                                    class="form-control" id="formGroupExampleInput" placeholder="Enter true/false" required>
                                @error('is_admin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            {{-- <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label h6">Is_admin</label>
                                <select name="is_admin" class="form-select" id="is_admin" required>
                                    <option value="{{ $user->id }}" {{ $user->is_admin == '1' ? 'selected' : '' }}>True
                                    </option>
                                    <option value="{{ $user->id }}" {{ $user->is_admin == '0' ? 'selected' : '' }}>
                                        False</option>
                                </select>
                                @error('is_admin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}


                            {{-- <div class="d-grid"> --}}

                            <button class="btn  btn-primary">Update</button>
                            {{-- </div> --}}
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
