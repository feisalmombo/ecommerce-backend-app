<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ProductController::class);

// Protect route by using this middleware
Route::group(['middleware' => 'auth:sanctum'], function() {
    // Route::apiResource('products', ProductController::class);
});

// Route::group(['prefix' => 'books', 'middleware' => 'auth:sanctum'], function () {
//     Route::get('/', [BookController::class, 'index']);
//     Route::post('add', [BookController::class, 'add']);
//     Route::get('edit/{id}', [BookController::class, 'edit']);
//     Route::post('update/{id}', [BookController::class, 'update']);
//     Route::delete('delete/{id}', [BookController::class, 'delete']);
//     Route::get('show/{id}', [BookController::class, 'show']);
// });

// Route for Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Route::group(['middleware' => 'auth:jwt'], function() {
//     Route::get('articles', 'ArticleController@index');
//     Route::get('articles/{article}', 'ArticleController@show');
//     Route::post('articles', 'ArticleController@store');
//     Route::put('articles/{article}', 'ArticleController@update');
//     Route::delete('articles/{article}', 'ArticleController@delete');
// });



// Route for All
Route::any('{any}', function(){
    return response()->json([
    	'status' => 'error',
        'message' => 'Resource not found'], 404);
})->where('any', '.*');
