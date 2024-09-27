<?php

use App\Http\Auth\Controllers\AuthController;
use App\Http\Categories\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Posts\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])
    ->name('index');

Route::group(['prefix' => 'auth', 'middleware' => 'authenticated'], function () {

    Route::get('/registration', [PageController::class, 'registration'])
        ->name('register.index');

    Route::post('/create', [AuthController::class, 'store'])
        ->name('register.store');

    Route::get('/login', [PageController::class, 'authorization'])
        ->name('auth.index');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('auth.store');

});

Route::group(['prefix' => 'categories', 'middleware' => 'admin'], function () {

    Route::get('/', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/{category}', [CategoryController::class, 'show'])
        ->name('categories.show');

    Route::get('/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::patch('/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');
});

Route::group(['prefix' => 'users'], function () {

    Route::get('profile', []);

});

Route::group(['prefix' => 'posts'], function () {

    Route::group(['middleware' => 'admin'], function () {

        Route::get('/moderation', [PostController::class, 'moderation'])
            ->name('posts.moderation');

        Route::patch('/moderate/{post}', [PostController::class, 'moderate'])
            ->name('posts.moderate');

    });

});
