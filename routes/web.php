<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mailValidate', function () {
    dd("toi");
    return view('');
});



Route::group(['prefix' => 'user'], function () {

    // news
    Route::get('/news', function () {
        return view('news.index');
    })->name('news');

    Route::get('/news/show', function () {
        return view('news.show');
    })->name('news.show');

    
    Route::get('/news/create', function () {
        return view('news.create');
    })->name('news.create');

    Route::get('/news/edit', function () {
        return view('news.edit');
    })->name('news.edit');

    // 
    Route::get('/chat/index', function () {
        return view('message.index');
    })->name('message.index');

    
    


    //login, Register, Forget password, reset link
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //User profile
    // Route::group(['middleware' => ['auth']], function () {

        Route::view('about', 'about')->name('about');

        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

        Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    // });

});
