<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DetailNewController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Users
// Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);

// Create
Route::get('/users/create', [UserController::class,'create']);
Route::post('/post-user', [UserController::class,'store']);

// Edit
Route::get('/users/{id}/edit', [UserController::class,'edit']);
Route::put('/users/{id}', [UserController::class,'update']);

// delete
Route::delete('/users/{id}', [UserController::class,'destroy']);


// Categories
Route::get('/categories', [CategoriesController::class,'index']);

// Create categories
Route::get('/categories/create', [CategoriesController::class,'create']);
Route::post('/post-categories', [CategoriesController::class,'store']);

// Edit categories
Route::get('/categories/{id}/edit', [CategoriesController::class,'edit']);
Route::put('/categories/{id}', [CategoriesController::class,'update']);

// Delete Categories
Route::delete('/categories/{id}', [CategoriesController::class,'destroy']);


// News
Route::get('/news', [NewsController::class,'index']);

// Create news
Route::get('/news/create', [NewsController::class,'create']);
Route::post('/post-news', [NewsController::class,'store']);

// Update news
Route::get('/news/{id}/edit', [NewsController::class,'edit']);
Route::put('/news/{id}', [NewsController::class,'update']);

// Delete news
Route::delete('/news/{id}', [NewsController::class,'destroy']);


// DetailNew
Route::get('/detail-new/{id}', [DetailNewController::class,'index'])->name('detailNew.index');
