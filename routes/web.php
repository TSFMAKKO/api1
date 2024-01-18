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

Route::get('/', function () {
    return view('welcome');
})->name('login');





Route::post('/login', [AuthController::class, 'login']);


Route::get('/logout', [AuthController::class, 'logout']);


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
