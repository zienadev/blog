<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthController extends Controller
{
    use AuthorizesRequests;


    public function showLoginForm()
    {
        return view("auth.loginn");
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
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
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route("show.home");
        }
        return back()->withErrors(["message" => "invalid email or password"]);
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route("login");
    }
}
