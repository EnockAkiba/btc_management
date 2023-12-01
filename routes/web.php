<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QuizController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// welcome page 

Route::controller(HomeController::class)->group(function () {
    Route::get("/", "welcome")->name("welcome");
    Route::get("/actualites", "blog")->name("blog");
    Route::get("/actualite/{new:slug}", "show")->name("blog.show");
    Route::get("/equipes", "teachers")->name("teachers");
});

Route::get('/sendEmail', function () {
    return view('sendEmail');
})->name('sendEmail');

Route::get('/page404', function () {
    return view('page404');
})->name('page404');

Route::get('account/verify/{slug}', [RegisterController::class, 'verifyAccount'])->name('user.verify');


Route::group(['prefix' => 'user'], function () {


    //login, Register, Forget password, reset link
    Auth::routes();



    //User profile
    Route::group(['middleware' => ['auth', 'userRoles']], function () {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        // PROFILE USER
        Route::view('about', 'about')->name('about');
        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
        // Route::get('user', [\App\Http\Controllers\UserController::class, 'index'])->name('user.show');
        Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
        // Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::put('profile/update/{user:slug}', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
        Route::post('profile/addPicture', [\App\Http\Controllers\UserController::class, 'setProfilePicture'])->name('setProfilePicture');


        // NEWS 

        Route::controller(NewsController::class)->group(function () {
            Route::get("news/index", "index")->name("news");
            Route::get("news/create", "create")->name("news.create");
            Route::post("news/store", "store")->name("news.store");
            Route::get("news/{news:slug}/show", "show")->name("news.show");
            Route::get("news/{news:slug}/edit", "edit")->name("news.edit");
            Route::put("news/{news:slug}/update", "update")->name("news.update");
            Route::get("news/{news:slug}/destroy", "destroy")->name("news.destroy");
            Route::get("news/{news:slug}/setType", "setType")->name("news.setType");
        });

        // COMMENTS
        Route::controller(CommentController::class)->group(function () {
            Route::post("comment/store", "store")->name("comment.store");
            Route::get("comment/{comment:slug}/destroy", "destroy")->name("comment.destroy");
        });

        // EXTENSIONS
        Route::controller(ExtensionController::class)->group(function () {
            Route::get("extension/index", "index")->name("extension");
            Route::get("extension/create", "create")->name("extension.create");
            Route::post("extension/store", "store")->name("extension.store");
            Route::get("extension/show/{extension:id}", "show")->name("extension.show");
            Route::get("extension/{extension:id}/edit", "edit")->name("extension.edit");
            Route::put("extension/{extension:id}/update", "update")->name("extension.update");
            Route::get("extension/{extension:id}/destroy", "destroy")->name("extension.destroy");
        });

        // DEPARTEMENT
        Route::controller(DepartementController::class)->group(function () {
            Route::get("departement/index", "index")->name("departement");
            Route::get("departement/create", "create")->name("departement.create");
            Route::post("departement/store", "store")->name("departement.store");
            Route::get("departement/{departement:slug}/show", "show")->name("departement.show");
            Route::get("departement/{departement:slug}/edit", "edit")->name("departement.edit");
            Route::put("departement/{departement:slug}/update", "update")->name("departement.update");
            Route::get("departement/{departement:slug}/destroy", "destroy")->name("departement.destroy");
        });


        // PROMOTION
        Route::controller(PromotionController::class)->group(function () {
            Route::get("promotion/index", "index")->name("promotion");
            Route::get("promotion/create", "create")->name("promotion.create");
            Route::post("promotion/store", "store")->name("promotion.store");
            Route::get("promotion/{promotion:slug}/show", "show")->name("promotion.show");
            Route::get("promotion/{promotion:slug}/edit", "edit")->name("promotion.edit");
            Route::put("promotion/{promotion:slug}/update", "update")->name("promotion.update");
            Route::get("promotion/{promotion:slug}/destroy", "destroy")->name("promotion.destroy");
        });








        // MESSAGES

        Route::controller(MessageController::class)->group(function () {
            Route::get("message/index", "index")->name("message");
            Route::get("message/create", "create")->name("message.create");
            Route::post("message/store", "store")->name("message.store");
            Route::post("message/store", "store")->name("message.store");
            Route::get("message/{message:slug}/show", "show")->name("message.show");
            Route::get("message/{message:slug}/edit", "edit")->name("message.edit");
            Route::put("message/{message:slug}/update", "update")->name("message.update");
            Route::get("message/{message:slug}/destroy", "destroy")->name("message.destroy");
        });


        // QUIZ CRUD

        Route::get('/Devoirs', function () {
            return view('quiz.index');
        })->name('quiz');

        Route::get('/Devoir/show', function () {
            return view('quiz.show');
        })->name('quiz.show');

        Route::get('/MesDevoirs', function () {
            return view('quiz.myQuizzes');
        })->name('myQuizzes');

        Route::get('/remettre', function () {
            return view('applay.create');
        })->name('applay.create');

        Route::get('/reponse', function () {
            return view('applay.show');
        })->name('applay.show');

        // // departements
        // Route::get('/departements', function () {
        //     return view('departement.index');
        // })->name('departement');

        // Route::get('/departement/show', function () {
        //     return view('departement.show');
        // })->name('departement.show');



        Route::get('/promotion/show', function () {
            return view('promotion.show');
        })->name('promotion.show');

        Route::get('/students', function () {
            return view('student.index');
        })->name('student');

        Route::get('/student/show', function () {
            return view('student.show');
        })->name('student.show');

        Route::get('/user/show', function () {
            return view('users.show');
        })->name('user.show');




        // Route::controller(QuizController::class)->group(function () {
        //     Route::get("quiz/index", "index")->name("quiz");
        //     Route::get("quiz/create", "create")->name("quiz.create");
        //     Route::post("quiz/store", "store")->name("quiz.store");
        //     Route::post("quiz/store", "store")->name("quiz.store");
        //     // Route::get("quiz/{quiz:slug}/show", "show")->name("quiz.show");
        //     Route::get("quiz/{quiz:slug}/edit", "edit")->name("quiz.edit");
        //     Route::put("quiz/{quiz:slug}/update", "update")->name("quiz.update");
        //     Route::get("quiz/{quiz:slug}/destroy", "destroy")->name("message.destroy");
        // });



    });
});
