@extends('layouts.app')

@section('title', 'edit category')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Edit Category</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('categories.update', $category->id) }}"
                        method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" id="formGroupExampleInput"
                                    class="form-label h6 ">Name</label>
                                <input value="{{ old('title', $category->name) }}" type="text"
                                    class="@error('title') is-invalid
                        @enderror form-control-lg form-control"
                                    placeholder="Post Title" name="name">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput3" class="form-label h6">Image</label>
                                <input type="file" id="formGroupExampleInput3" class="form-control form-control-sm"
                                    placeholder="image" name="image">
                                @if ($category->image != '')
                                    <img class="w-50 my-3" src="{{ asset('images/' . $category->image) }}" alt="">
                                @endif
                            </div>

                            {{-- <div class="mb-3">
                                <label for="formGroupExampleInput3" class="form-label h6">Image</label>
                                <input type="file" name="images[]" id="formGroupExampleInput3"
                                    class="form-control form-control-sm" placeholder="image" multiple>
                                <div>
                                    @if (is_array($post->images))
                                        @foreach ($post->images as $image)
                                            <img class="w-50 my-3" src="{{ asset('images/posts/' . $image) }}"
                                                alt="">
                                        @endforeach
                                    @endif
                                </div>
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
