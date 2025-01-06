<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Category;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [PostController::class, "index"])->name("posts.index");
// Route::get('posts', [PostController::class, "create"])->name("posts.create");
// Route::post('/', [PostController::class, "store"])->name("posts.store");
// Route::get('posts/{post}/edit', [PostController::class, "edit"])->name("posts.edit");
// Route::put('posts/{post}', [PostController::class, "update"])->name("posts.update");
// Route::delete('posts/{post}', [PostController::class, "destroy"])->name("posts.destroy");
// Route::get('posts/{post}', [PostController::class, "show"])->name("posts.show");


Route::get("/", [AuthController::class, "showLoginForm"])->name("login");
Route::post("/", [AuthController::class, "login"]);
Route::get('home', [ShowController::class, "show"])->name('show.home');

Route::middleware("guest")->group(function () {
    // Route::get("/", [AuthController::class, "showLoginForm"])->name("login");
    // Route::post("/", [AuthController::class, "login"]);
});


Route::middleware("auth")->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);
    Route::resource('tags', TagController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('categories', CategoryController::class);

    Route::post('/logout', [AuthController::class, "logout"])->name("logout");
});
