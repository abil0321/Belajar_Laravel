<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

// Route::get('/', function () {
//     return view('welcome');
// })->name("welcome");

Route::get('/', fn () => view('welcome'));//->name("welcome");

Route::get('/home', Controllers\HomeController::class);//->name("welcome");

Route::get('/about', [Controllers\AboutController::class, 'index']);//->name("welcome");

Route::get('/galeri', [Controllers\GaleriController::class, 'index']);//->name("welcome");

Route::get('/contact', [Controllers\ContactController::class, 'index']);//->name("welcome");

Route::get('/users', [Controllers\UserController::class,'index']);

Route::get('/users/create', [Controllers\UserController::class,'create']);
Route::post('/users', [Controllers\UserController::class,'store']);

// Route::get('/articles/create', function () {
//     \App\Models\Article::create([
//         'title' => $title = 'my first article',
//         'slug' => str($title)->slug(),
//         'body' => $body = 'This is the body of my firstarticles',
//         'teaser' => $teaser = str($body)->limit(150),
//         'meta_title' => $title,
//         'meta_description' => $teaser,
//     ]);
// });

Route::get('users_statis', function () {
    $users = [
        ['id' => 1, 'name' => 'john doe', 'email' => 'johndoe@gmail.com'],

        ['id' => 2, 'name' => 'jane doe', 'email' => 'janedoe@gmail.com'],
    ];
    return view('users.index', compact('users'));
});
