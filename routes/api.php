<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts/{post}', [PostController::class, 'index3'])->middleware('auth:sanctum');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login2']);

Route::post('/logout2', [AuthController::class, 'logout2'])->middleware('auth:sanctum');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->group(function () {
//     // 在這裡定義需要認證的 API 路由
//     Route::get('/user', [YourController::class, 'getUser']);
// });