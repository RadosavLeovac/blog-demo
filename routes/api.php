<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/posts' ,[App\Http\Controllers\PostController::class, 'index'] );
Route::post('/post', [App\Http\Controllers\PostController::class, 'store']);
Route::delete('/post/{id}', [App\Http\Controllers\PostController::class, 'destroy']);
Route::get('/post/show/{id}', [App\Http\Controllers\PostController::class, 'show']);
Route::patch('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'update']);
