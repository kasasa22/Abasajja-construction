<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/plans', function () {
    return view('plans');
});

Route::get('/plans/{id}', function ($id) {
    return view('plan-detail', ['id' => $id]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog/{id}', function ($id) {
    return view('blog-detail', ['id' => $id]);
});

