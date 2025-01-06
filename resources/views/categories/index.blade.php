 @extends('layouts.app')

 @section('title', 'Category')

 @section('content')

     <body>
         <div class="container">
             <div class="row justify-content-center mt-4">
                 <div class="col-md-10 d-flex justify-content-end">
                     <a href={{ route('categories.create') }} class="btn btn-primary">Add New Category</a>
                 </div>
             </div>
             <div class="row d-flex justify-content-center">
                 <div class="col-md-16">
                     <div class="card borde-0 shadow-lg my-4">
                         <div class="card-header bg-dark">
                             <h3 class="text-white">Categories</h3>
                         </div>
                         <div class="card-body">
                             <table class="table">
                                 <tr>
                                     <th>Name</th>
                                     <th>Image</th>
                                     <th>Action</th>
                                 </tr>
                                 @if ($categories->isNotEmpty())
                                     @foreach ($categories as $category)
                                         <tr>
                                             <td>{{ $category->name }}</td>
                                             <td>
                                                 @if ($category->image != '')
                                                     <img width="100" src="{{ asset('images/' . $category->image) }}"
                                                         alt="">
                                                 @endif
                                             </td>
                                             <td>
                                                 <a href="{{ route('categories.edit', $category) }}"
                                                     class="btn btn-secondary">Edit</a>
                                                 <a href="{{ route('categories.show', $category) }}"
                                                     class="btn btn-dark">Show</a>
                                                 <a href="#" onclick="deleteCategory({{ $category->id }});"
                                                     class="btn btn-danger">Delete</a>
                                                 <form id="delete-category-from-{{ $category->id }}"
                                                     action="{{ route('categories.destroy', $category) }}" method="post">
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
     function deleteCategory(id) {
         if (confirm("Are you sure you want to delete Category?")) {
             document.getElementById("delete-category-from-" + id).submit();
         }
     }
 </script>
