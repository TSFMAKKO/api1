<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\AuthController;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('login');





Route::post('/login', [AuthController::class, 'login']);


Route::get('/logout', [AuthController::class, 'logout']);


// Route::get('/posts/{post}', [PostController::class, 'index']);




// Route::get('/posts/{post}', function () {
    
//     $data = ['message' => 'Login successful', 'token' => 'your_access_token'];
//     $jsonString = json_encode($data);

//     echo $jsonString;
// });


