<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Helper Classes
// Helper Functions

// HTTP Methods Routes

// Route::get($uri, $action);
// Route::post($uri, $action);
// Route::put($uri, $action);
// Route::patch($uri, $action);
// Route::delete($uri, $action);

/**
 *  https://example.com
 *  https://example.com/categories
 *  https://example.com/products
 */


Route::get('/', function () {
    return "HOMEPAGE";
});

Route::get('/categories', function () {
    return "CATEGORIES";
});

Route::get('/products', function () {
    return "PRODUCTS";
});

Route::fallback(function () {
    return "Errorrrrrrrrrrrrrrrrrrrrrr"; // Default Error
});

Route::match(['put', 'patch'], 'edit', function () {
    return "Edit Processing...";
});

Route::any('anything', function () {
    return "Anything Requests";
});

// $request = new Request();
Route::get('/request', function (Request $request) {  // Dependency Injection
    dump($request);
});

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::view('welcome', 'welcome'); // resources/views/
Route::view('privacy', 'privacy'); // resources/views/

// Route::get('/login', function () {
//     return redirect('/auth/login');
// });

Route::redirect('login', 'auth/login'); // Shortcut


// Route Parameters

Route::get('/posts/{post}/comments/{comment?}', function ($postId, $commentId = 0) {
    return "Post number #$postId and the comment number #$commentId";
});

// // 2004-11-28
// Route::get('calc-age/{dob}', function ($dob) {
//     list($year, $month, $day) = explode('-', $dob); // destruction

//     $years = date('Y') - $year; // 2026 - 2004 = 22
//     $months = date('m') - $month; // 05 - 11 = -06
//     $days = date('d') - $day; // 21 - 28 = -07
//     // $hours = $days - 24;

//     if ($months < 0) {
//         $years--;
//         $months += 12;
//     }

//     if ($days < 0) {
//         $months--;
//         $days += 30;
//     }

//     dd($years, $months, $days);
// });

// 2004-11-28
Route::get('calc-age/{dob}', function ($dob) {
    $now = new DateTime();
    $diff = $now->diff(new DateTime($dob));
    dd($diff);
});


Route::get('user/{name}/{age}', function ($name, $age) {
    return "Welcome $name, Your Age Is $age";
})->name('user')->whereAlpha('name')->whereNumber('age');
// ->where('user', '[A-Za-z]+')->where('age', '[0-9]+');

/**
 * Home
 * About
 */

Route::get('/', function () {
    // return "<a href='/about-us'>About Page</a>";
    // $url = url('about-us');
    // return "<a href='$url'>About Page</a>";
    $name = "Ali";
    $age = 25;
    $url = route('user', ['name' => $name, 'age' => $age]);
    return "<a href='$url'>About Page</a>";
})->name('home');

Route::get('/about', function () {
    return "<a href=''>Homepage</a>";
})->name('about');


Route::get('home', [MainController::class, 'home'])->name('home');

Route::get('about', [MainController::class, 'about'])->name('about');

Route::get('services', [MainController::class, 'services'])->name('services');

Route::get('contact', [MainController::class, 'contact'])->name('contact');

Route::get('users/{user}', [MainController::class, 'users'])->name('users');


// include __DIR__ . 'admin.php';
