<?php

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

Route::get('/', function() {
    return 'Homepage';
});

Route::post('news', function() {
    return 'News Page';
});

Route::get('news', function() {
    return 'News Page';
});

Route::put('news', function() {
    return 'News Page';
});

Route::delete('news', function() {
    return 'News Page';
});

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
