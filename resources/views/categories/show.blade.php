@extends('layouts.app')

@section('title', 'show category')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg bg-light my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Categories Details </h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label h6">Name</label>
                            <input class="form-control  bg-light" type="text" value="{{ $category->name }}"
                                aria-label="readonly input example" readonly>
                        </div>
                        <div class="mb-3">
                            <labeImage for="formFileDisabled" class="form-label h6">Image</label>
                                <input class="form-control  bg-light" type="file" id="formFileDisabled" disabled>
                        </div>
                        @if ($category->image != '')
                            {{-- @foreach ($category->images as $image) --}}
                            {{-- <img src="{{ asset('/images/posts/' . $image) }}"> --}}
                            <img class="w-50 my-3" src="{{ asset('images/' . $category->image) }}" alt="">
                            {{-- @endforeach --}}
                        @endif
                    </div>
                    {{-- <div class="d-grid">
                            <button class="btn btn-lg btn-primary">Update</button>
                        </div> --}}
                </div>
                </form>
            </div>

        </div>
    </div>

@endsection
