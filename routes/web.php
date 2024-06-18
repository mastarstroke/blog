<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Main\HomeController::class, 'get_home'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\Main\HomeController::class, 'getdashboard'])->name('dashboard');
Route::get('/post_details/{post}', [App\Http\Controllers\Main\PostController::class, 'post_detail'])->name('post_details');
Route::post('/post/comment', [App\Http\Controllers\Main\PostController::class, 'post_comment'])->name('post/comment');

Route::group(['middleware' => ['auth', admin()]], function(){

    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'admin_dashboard'])->name('admin/dashboard');

    Route::get('category/page', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category/page');
    Route::get('add/category', [App\Http\Controllers\Admin\CategoryController::class, 'add_category'])->name('add/category');
    Route::post('store/category', [App\Http\Controllers\Admin\CategoryController::class, 'store_category'])->name('store/category');
    Route::get('edit/category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit_category'])->name('edit/category');
    Route::post('update/category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update_category'])->name('update/category');
    Route::delete('delete/category', [App\Http\Controllers\Admin\CategoryController::class, 'delete_category'])->name('delete/category');

    Route::get('/posts/search', [App\Http\Controllers\Admin\PostController::class, 'post_search'])->name('posts.search');

    Route::get('admin/post/page', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin/post/page');
    Route::post('admin/store/post', [App\Http\Controllers\Admin\PostController::class, 'store_posts'])->name('admin/store/post');
    Route::get('admin/edit/post/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit_posts'])->name('admin/edit/post');
    Route::post('admin/update/post/{id}', [App\Http\Controllers\Admin\PostController::class, 'update_posts'])->name('admin/update/post');
    Route::delete('admin/delete/post/{id}', [App\Http\Controllers\Admin\PostController::class, 'delete_posts'])->name('admin/delete/post');
});

Route::group(['middleware' => ['auth', user()]], function(){

    Route::get('/user/dashboard', [App\Http\Controllers\User\DashboardController::class, 'user_dashboard'])->name('user/dashboard');
    
    Route::get('/posts/search', [App\Http\Controllers\Admin\PostController::class, 'post_search'])->name('posts.search');
    
    Route::get('/view/post', [App\Http\Controllers\Main\PostController::class, 'post_view'])->name('view/post');
    Route::get('/add/post', [App\Http\Controllers\Main\PostController::class, 'add_post'])->name('add/post');
    Route::post('/store/post', [App\Http\Controllers\Main\PostController::class, 'store_post'])->name('store/post');
    Route::get('/edit/post/{id}', [App\Http\Controllers\Main\PostController::class, 'edit_post'])->name('edit/post');
    Route::post('/update/post/{id}', [App\Http\Controllers\Main\PostController::class, 'update_post'])->name('update/post');
    Route::delete('/delete/post/{id}', [App\Http\Controllers\Main\PostController::class, 'delete_post'])->name('delete/post');
});