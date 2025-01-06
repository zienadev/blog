<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $imageName = "";
        if ($request->hasFile("image")) {
            $imageName = $request->file("image")->getClientOriginalName() . "-" . time() . "." .
                $request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("images"), $imageName);
        }


        Category::create([
            "name" => $request->name,
            "image" => $imageName
        ]);
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $this->authorize('view', $category);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        return view('categories.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image||mimes:jpeg,png,jpg,gif',
        ]);
        $category->update([
            'name' => $request->name,
        ]);
        if ($request->image != "") {
            // delete old image
            File::delete(public_path('images/' . $category->image));
            $category->update([
                // Update the image if a new one is uploaded
                'image' => $request->hasFile('image') ? $this->uploadImage($request->file('image')) : $category->image,
            ]);
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        if (auth()->Auth::user()->is_admin === true) {
            $category->delete();
            // delete image
            File::delete(public_path('images/' . $category->image));
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        }
    }
    private function uploadImage($file)
    {
        $imageName = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/'), $imageName);
        return $imageName;
    }
}
