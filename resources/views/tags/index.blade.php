@extends('layouts.app')

@section('title', 'Tag')

@section('content')

    <body>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-10 d-flex justify-content-end">
                    <a href={{ route('tags.create') }} class="btn btn-primary">Add New Tag</a>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-16">
                    <div class="card borde-0 shadow-lg my-4">
                        <div class="card-header bg-dark">
                            <h3 class="text-white">Tags</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                @if ($tags->isNotEmpty())
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->name }}</td>
                                            {{-- <td>
                                                @if ($category->image != '')
                                                    <img width="100" src="{{ asset('images/' . $category->image) }}"
                                                        alt="">
                                                @endif
                                            </td> --}}
                                            <td>
                                                <a href="{{ route('tags.edit', $tag) }}" class="btn btn-secondary">Edit</a>
                                                {{-- <a href="{{ route('tags.show', $tag) }}" class="btn btn-dark">Show</a> --}}
                                                <a href="#" onclick="deleteTag({{ $tag->id }});"
                                                    class="btn btn-danger">Delete</a>
                                                <form id="delete-tag-from-{{ $tag->id }}"
                                                    action="{{ route('tags.destroy', $tag) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </table>
                        </div>

                    </div>

                </div>
            </div>
    </body>
@endsection

</html>

<script>
    function deleteTag(id) {
        if (confirm("Are you sure you want to delete Tag?")) {
            document.getElementById("delete-tag-from-" + id).submit();
        }
    }
</script>
