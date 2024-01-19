<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
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

use App\Http\Controllers\MessageController;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

Route::get('/', function () {
    return view('welcome');
})->name('login');





Route::post('/login', [AuthController::class, 'login']);


Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/test2', [PostController::class, 'index2'])->middleware('auth:sanctum');


Route::get('/mail', function () {
    // 取得當前已認證的用戶
    $user = auth()->user();

    // 檢查用戶是否存在
    if ($user) {
        // 使用郵件類和郵件視圖發送郵件
        Mail::to($user->email)->send(new WelcomeEmail($user));

        // 或者使用 sendNow 方法以同步方式發送郵件（適用於開發環境）
        // Mail::to($user->email)->sendNow(new WelcomeEmail($user));

        return "Mail sent successfully!";
    } else {
        return "User not authenticated.";
    }
})->middleware('auth:sanctum');


Route::get('/messages', [MessageController::class,'index'])->name('messages.index')->middleware('auth:sanctum');

// Route::get('/posts/{post}', [PostController::class, 'index']);

Route::get('/test', function () {
    // echo "test";
    $tokens = DB::table('personal_access_tokens')->get();

    $targetToken = '3|qOc3agi4OL1ELJzkMkZi3cwhTDy7z6nka7eWMYfvc5ec90d1';

    // 使用 password_hash 函數加密密碼
    $hashedPassword = password_hash($targetToken, PASSWORD_BCRYPT);

    dump($hashedPassword);

    echo "<br>";
    $userId = null;

    dump($tokens);

    foreach ($tokens as $token) {
        dump($token->token);

        if (password_verify($targetToken, $token->token)) {
            // 找到了匹配的 personal access token，可以繼續處理
            global $userId;
            $userId = $token->tokenable_id; // 這裡的 tokenable_id 可能是用戶的 ID
            break;
        }
    }

    echo "userId:$userId";
});




// Route::get('/posts/{post}', function () {

//     $data = ['message' => 'Login successful', 'token' => 'your_access_token'];
//     $jsonString = json_encode($data);

//     echo $jsonString;
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
