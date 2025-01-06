@extends('layouts.app')
@section('title', 'edit tag ')



@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Edit Tag</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('tags.update', $tag->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" id="formGroupExampleInput"
                                    class="form-label h6 ">Name</label>
                                <input value="{{ old('name', $tag->name) }}" type="text"
                                    class="@error('name') is-invalid
                    @enderror form-control-lg form-control"
                                    placeholder="Post Title" name="name">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="btn  btn-primary">Update</button>
                            {{-- </div> --}}
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
