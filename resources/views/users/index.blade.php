@extends('layouts.app')

@section('title', 'User')

@section('content')

    <body>
        <div class="container">
            <div class="row justify-content-center mt-4">
                {{-- <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="logout" class="btn btn-danger">
                </form> --}}
                {{-- <div class="col-md-10 d-flex justify-content-end">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="logout" class="btn btn-danger">
                    </form>
                </div> --}}
                <div class="col-md-10 d-flex justify-content-end">
                    {{-- @can('manageUser') --}}
                    <a href={{ route('users.create') }} class="btn btn-primary">Add New User</a>
                    <a href={{ route('posts.index') }} class="btn btn-secondary">Back</a>
                    {{-- @endcan --}}
                </div>


            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-16">
                    <div class="card borde-0 shadow-lg my-4">
                        <div class="card-header bg-dark">
                            <h3 class="text-white">Users</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Password</th> --}}
                                    <th>Is_admin</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                @if ($users->isNotEmpty())
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            {{-- <td>{{ $user->password }}</td> --}}
                                            <td>{{ $user->is_admin }}</td>
                                            <td>
                                                @if ($user->image != '')
                                                    <img width="100" src="{{ asset('images/' . $user->image) }}"
                                                        alt="">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user) }}"
                                                    class="btn btn-secondary">Edit</a>
                                                <a href="#" onclick="deleteUser({{ $user->id }});"
                                                    class="btn btn-danger">Delete</a>
                                                <form id="delete-user-from-{{ $user->id }}"
                                                    action="{{ route('users.destroy', $user) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <a href="{{ route('users.show', $user) }}" class="btn btn-dark">Show</a>

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
    function deleteUser(id) {
        if (confirm("Are you sure you want to delete User?")) {
            document.getElementById("delete-user-from-" + id).submit();
        }
    }
</script>
