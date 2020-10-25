<?php

use App\Http\Controllers\ArticelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/articles/', [ArticelController::class, 'index'])->name('index');
Route::post('/articles/store', [ArticelController::class, 'store'])->name('store');
Route::get('/articles/edit/{id}', [ArticelController::class, 'getArticle'])->name('getArticle');
Route::get('/articles/show/{id}', [ArticelController::class, 'getArticle'])->name('getArticleShow');
Route::put('/articles/update/{id}', [ArticelController::class, 'update'])->name('update');
Route::delete('/articles/delete/{id}', [ArticelController::class, 'delete'])->name('delete');
