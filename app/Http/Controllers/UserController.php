<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("manageUser", User::class);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("manageUser", User::class);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("manageUser", User::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($request->hasFile("image")) {
            $imageName = $request->file("image")->getClientOriginalName() . "-" . time() . "." .
                $request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("images/"), $imageName);
        }

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "image" => $imageName
            // "is_admin" => $request->is_admin
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize("manageUser", User::class);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize("manageUser", User::class);
        return view('users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize("manageUser", User::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            // 'is_admin' => $request->is_admin
        ]);
        if ($request->image != "") {

            File::delete(public_path('images/' . $user->image));
            $user->update([

                'image' => $request->hasFile('image') ? $this->uploadImage($request->file('image')) : $user->image,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize("manageUser", User::class);

        // if (auth()->Auth::user()->is_admin === true) {
        $user->delete();
        // delete image
        File::delete(public_path('images/' . $user->image));
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
        // }
    }
    private function uploadImage($file)
    {
        $imageName = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/'), $imageName);
        return $imageName;
    }
}
