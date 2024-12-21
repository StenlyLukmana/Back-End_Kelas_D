<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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

//UserController
Route::get('/register', [UserController::class, 'register']);
Route::POST('/register', [UserController::class, 'registerUser']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::POST('/login', [UserController::class, 'authenticate']);

Route::middleware('auth')->group(function() {
    Route::get('/view', [BookController::class, 'viewBooks']) -> name('view');
    Route::POST('logout', [UserController::class, 'logout']);
});

Route::middleware('admin')->group(function() {
    //BookController
    Route::get('/create', [BookController::class, 'form']) -> name('form');
    Route::POST('/create', [BookController::class, 'createBook']) -> name('createBook');
    Route::get('/update/{id}', [BookController::class, 'getBookByID'])  -> name('getBookByID');
    Route::PATCH('/update/{id}', [BookController::class, 'updateBook']) -> name('updateBook');
    Route::DELETE('/delete-book/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');

    //CategoryController
    Route::get('/create-category', [CategoryController::class, 'createCategoryPage']) -> name('createCategoryPage');
    Route::POST('/create-category', [CategoryController::class, 'createCategory']) -> name('createCategory');
});