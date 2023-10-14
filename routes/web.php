<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
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


Route::group(['prefix' => 'user'], function () {


    //login, Register, Forget password, reset link
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    //User profile
    Route::group(['middleware' => ['auth']], function () {

        // PROFILE USER
        Route::view('about', 'about')->name('about');
        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
        // Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::put('profile/update/{user:slug}', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
        Route::post('profile/addPicture', [\App\Http\Controllers\UserController::class, 'setProfilePicture'])->name('setProfilePicture');


        // NEWS 

        Route::controller(NewsController::class)->group(function () {
            Route::get("news/index", "index")->name("news");
            Route::get("news/create", "create")->name("news.create");
            Route::post("news/store", "store")->name("news.store");
            Route::get("news/show", "show")->name("news.show");
            Route::get("news/edit", "edit")->name("news.edit");
            Route::put("news/update", "update")->name("news.update");
            Route::get("news/destroy", "destroy")->name("news.destroy");
        });

        // MESSAGES

        Route::controller(MessageController::class)->group(function () {
            Route::get("message/index", "index")->name("message");
            Route::get("message/create", "create")->name("message.create");
            Route::post("message/store", "store")->name("message.store");
            Route::get("message/{message:slug}/show", "show")->name("message.show");
            Route::get("message/{message:slug}/edit", "edit")->name("message.edit");
            Route::put("message/{message:slug}/update", "update")->name("message.update");
            Route::get("message/{message:slug}/destroy", "destroy")->name("message.destroy");
        });

    });


});
