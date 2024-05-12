<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

// Route::get('/', function () {
//     return view('welcome');
// })->name("welcome");

Route::get('/', fn () => view('welcome'));//->name("welcome");

Route::get('/about', fn () => view('about'));//->name("welcome");

Route::get('/galeri', fn () => view('galeri'));//->name("welcome");

Route::get('/home', fn () => view('home'));//->name("welcome");

Route::get('/contact', fn () => view('contact'));//->name("welcome");

Route::get('users', function () {
    $users = [
        ['id' => 1, 'name' => 'john doe', 'email' => 'johndoe@gmail.com'],
        
        ['id' => 2, 'name' => 'jane doe', 'email' => 'janedoe@gmail.com'],
    ];
    return view('users.index', compact('users'));
});
