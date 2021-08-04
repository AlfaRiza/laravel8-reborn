<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'name' => 'M. Alfa Riza',
        'email' => 'malfariza45@gmail.com',
        'image' => '1.jpg'
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

// Halaman single post
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('categories', function(){
    return view('categories', [
        'title' => 'Post Category',
        'categories' => Category::all()
    ]);
});

Route::get('categories/{category:slug}', function(Category $category){
    return view('posts', [
        'title' => "Post By Category : $category->name",
        'posts' => $category->posts->load(['author', 'category']),
        // 'category' => $category->name
    ]);
});

Route::get('/authors/{author:username}', function(User $author){
    return view('posts', [
        'title' => 'Post By Author : ' . $author->name,
        // 'posts' => Post::all(),
        'posts' => $author->posts->load(['author', 'category'])
    ]);
});