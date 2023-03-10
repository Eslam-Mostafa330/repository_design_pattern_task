<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('site.index');
// });



Route::get('/', [SiteController::class, "index"]);
Route::get("/blog/{id}", [SiteController::class, "blog_details"]);
Route::get("/category/{id}", [SiteController::class, "category"]);
Route::post("/comment", [SiteController::class, "comment"]);

Route::get("login", [UserController::class, "login"])->name('login');
Route::get("logout", [UserController::class, "logout"]);
Route::post("login", [UserController::class, "loginRequest"]);



Route::group(['prefix' => 'admin/category', 'middleware' => 'auth'], function(){
    Route::get("/", [CategoryController::class, "index"]);
    Route::get("/create", [CategoryController::class, "create"]);
    Route::post("/store", [CategoryController::class, "store"]);
    Route::get("/delete/{id}", [CategoryController::class, "destroy"]);
    Route::get("/edit/{id}", [CategoryController::class, "edit"]);
    Route::post("/update", [CategoryController::class, "update"]);
});

Route::group(['prefix' => 'admin/article'], function() {
    Route::get("/", [ArticleController::class, "index"]);
    Route::get("/create", [ArticleController::class, "create"]);
    Route::post("/store", [ArticleController::class, "store"]);
});





// Route::get("admin/article", [ArticleController::class, "index"]);