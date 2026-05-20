<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Home About Contact Us


Route::get('/home', function () {
    return "<h1>HOMEPAGE</h1>";
});

Route::get('/about', function () {
    return "<h1>ABOUT US</h1>";
});

Route::get('/contact', function () {
    return "<h1>CONTACT US</h1>";
});
