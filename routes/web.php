<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// use
// namespace

// Route::get('url', 'Action');
// Route::post('url', 'Action');
// Route::patch('url', 'Action');
// Route::put('url', 'Action');
// Route::delete('url', 'Action');

// .
// =>
// ::
// ->

// Route::get('/', function() {
//     return 'Homepage';
// });

// Route::post('news', function() {
//     return 'News Page';
// });

// Route::get('about-us', function() {
//     return 'About Us Page';
// });


// Route::get('/', function() {
//     return view('welcome');
// });

// Route::view('/', 'welcome');
// Route::any('test', function() {
//     return 'Test';
// });

// Route::match(['post', 'delete', 'get'], 'newnew', function() {
//     return 'ddddd';
// });

Route::get('/user/{name}/{age}', function($name, $age) {
    return 'Welcome ' . $name . ', your age is ' . $age;
})->whereAlpha('name')->whereNumber('age');


// Route::get('news', function() {
//     return 'News';
// });

// Route::get('news/{id?}', function($id = null) {
//     return 'News ' . $id;
// });

// Route::get('/', function() {
//     $post = 10;
//     $comment = 20;
//     // $url = url('/user/posts/'.$post.'/comments/'.$comment.'/show');
//     $url = route('userinfo', [$post, $comment]);
//     return 'To show the comment of user post please go to this url ' .$url ;
// });

// Route::get('/user/{postid}/mycomments/{commentid}/show', function($postid, $commentid) {
//     return "User Post $postid Comment $commentid";
// })->name('userinfo');

// Route::get('/', [SiteController::class, 'home']);

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/user/{id}', [SiteController::class, 'user'])->name('user');

// Route::get('/', 'SiteController@index')->name('index');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
});

Route::prefix('customers')->name('customers.')->group(function() {
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
});

Route::prefix('users')->name('users.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
});

Route::get('site1', [Site1Controller::class, 'index'])->name('site1');
