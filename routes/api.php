<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailNewController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\client\CategoriesController as ClientCategoriesController;
use App\Http\Controllers\Client\IndexController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Login\RegisterController;

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

// Admin
// Users
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
Route::get('/detail-new/{idNew}', [DetailNewController::class,'index'])->name('detailNew.index');

// Create detailNew
Route::get('/detail-new/{idNew}/create', [DetailNewController::class,'create']);
Route::post('/post-detail-new', [DetailNewController::class,'store']);

// Update detailNew
Route::get('/detail-new/{id}/edit/{idNew}', [DetailNewController::class,'edit']);
Route::put('/detail-new/{id}', [DetailNewController::class,'update']);

// Delete detailNew
Route::delete('/detail-new/{id}', [DetailNewController::class,'destroy']);

// Client
// Pegister
Route::post('/register', [RegisterController::class,'store']);

// Login
Route::post('/login', [LoginController::class,'index']);
Route::post('/logout', [LoginController::class,'logout']);

// Index
Route::get('getTrendingTopNews', [IndexController::class,'getTrendingTopNews']);
Route::get('getTrendingBottomNews', [IndexController::class,'getTrendingBottomNews']);
Route::get('getTrendingRightNews', [IndexController::class,'getTrendingRightNews']);
Route::get('getPopularOnWeekNews', [IndexController::class,'getPopularOnWeekNews']);
Route::get('getCategoriesNewsHomeTab', [IndexController::class,'getCategoriesNewsHomeTab']);
Route::get('getCategoriesNews', [IndexController::class,'getCategoriesNews']);


// Categories
Route::get('getAllNews', [ClientCategoriesController::class,'getAllNews']);
Route::get('getAllCategories', [ClientCategoriesController::class,'getAllCategories']);
