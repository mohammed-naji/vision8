<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Formscontroller;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RealtionController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;
use App\Http\Controllers\Site3Controller;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// use
// namespace

// $route = new Route();
// $route->get();

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

Route::prefix('site2')->name('site2.')->group(function() {
    Route::get('/', [Site2Controller::class, 'index'])->name('index');
    Route::get('/about', [Site2Controller::class, 'about'])->name('about');
    Route::get('/contact', [Site2Controller::class, 'contact'])->name('contact');
    Route::get('/post', [Site2Controller::class, 'post'])->name('post');
});

Route::prefix('site3')->name('site3.')->group(function() {
    Route::get('/', [Site3Controller::class, 'index'])->name('index');
    Route::get('/experience', [Site3Controller::class, 'experience'])->name('experience');
    Route::get('/education', [Site3Controller::class, 'education'])->name('education');
    Route::get('/skills', [Site3Controller::class, 'skills'])->name('skills');
    Route::get('/interests', [Site3Controller::class, 'interests'])->name('interests');
    Route::get('/awards', [Site3Controller::class, 'awards'])->name('awards');
});

Route::get('form1', [Formscontroller::class, 'form1'])->name('form1');
Route::post('form1', [Formscontroller::class, 'form1_data'])->name('form1_data');

Route::get('form2', [Formscontroller::class, 'form2'])->name('form2');
Route::post('form2', [Formscontroller::class, 'form2_data'])->name('form2_data');

Route::get('form3', [Formscontroller::class, 'form3'])->name('form3');
Route::post('form3', [Formscontroller::class, 'form3_data'])->name('form3_data');

Route::get('form4', [Formscontroller::class, 'form4'])->name('form4');
Route::post('form4', [Formscontroller::class, 'form4_data'])->name('form4_data');

Route::get('form5', [Formscontroller::class, 'form5'])->name('form5');
Route::post('form5', [Formscontroller::class, 'form5_data'])->name('form5_data');

Route::get('send-mail', [MailController::class, 'send']);

Route::get('contact-us', [MailController::class, 'contact_us']);
Route::post('contact-us', [MailController::class, 'contact_us_data'])->name('contact_us');







Route::get('posts/trash', [PostController::class, 'trash'])->name('posts.trash');

Route::get('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');

Route::get('posts/{id}/forcedelete', [PostController::class, 'forcedelete'])->name('posts.forcedelete');

Route::get('posts/restore-all', [PostController::class, 'restore_all'])->name('posts.restore_all');

Route::get('posts/delete-all', [PostController::class, 'delete_all'])->name('posts.delete_all');


// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');

// Route::get('posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('posts/{id}/update', [PostController::class, 'update'])->name('posts.update');

Route::resource('posts', PostController::class);

Route::resource('products', ProductController::class);


// Realtionship routes
Route::get('one-to-one', [RealtionController::class, 'one_to_one']);

Route::get('my-posts/{id}', [RealtionController::class, 'one_to_many'])->name('mypost');
Route::post('one-to-many', [RealtionController::class, 'one_to_many_data'])->name('one_to_many_data');


Route::get('many-to-many', [RealtionController::class, 'many_to_many']);
Route::post('many-to-many', [RealtionController::class, 'many_to_many_data'])->name('many_to_many_data');
