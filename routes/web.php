<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/example-2', function(){
    return view('example');
});

Route::get('/example-3', function(){
    return view('example-3');
});