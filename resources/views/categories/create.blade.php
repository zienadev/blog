@extends('layouts.app')

@section('title', 'create category')

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
                        <h3 class="text-white">Add New Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label h6">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="formGroupExampleInput" placeholder="Enter Category Name" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="images">Images</label>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div> --}}
                            <div class="mb-3">
                                <label for="formGroupExampleInput3" class="form-label h6">Image</label>
                                <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                                    id="formGroupExampleInput3" placeholder="Choose Image" required multiple>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>

                        </form>

                    </div>
                </div>
            </div>


        @endsection
