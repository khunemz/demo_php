<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// Route::prefix('api')->group(function () {
//     Route::get('/posts', [PostController::class, 'index']);
// });
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('post.update');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
