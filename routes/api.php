<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/get/post', [App\Http\Controllers\Api\PostController::class, 'postView']);
    Route::post('/post/store', [App\Http\Controllers\Api\PostController::class, 'storePost']);
    Route::get('/post/edit/{id}', [App\Http\Controllers\Api\PostController::class, 'editPost']);
    Route::post('/update/post/{id}', [App\Http\Controllers\Api\PostController::class, 'updatePost']);
    Route::delete('/post/delete/{id}', [App\Http\Controllers\Api\PostController::class, 'deletePost']);
});

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
