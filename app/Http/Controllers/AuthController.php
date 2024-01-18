<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 登入
    public function login(Request $request)
    {
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // 登入成功，返回相應的回應
            // return response()->json(['message' => 'Login successful']);
            $user = Auth::user();
            $token = $user->createToken('app-token')->plainTextToken;
            // 將 token 存入 Cookie，名稱為 'access_token'，有效期為一天
            $cookie = cookie('access_token', $token, 1440);

            return response()->json(['message' => 'Login successful', 'token' => $token])->withCookie($cookie);;
        }

        // 登入失敗，返回相應的錯誤回應
        // return response()->json(['message' => 'Invalid credentials'], 401);
        throw ValidationException::withMessages(['email' => 'Invalid credentials']);
    }

    // 登出
    public function logout()
    {
        // 獲取當前認證的使用者
        $user = Auth::user();

        // 撤銷所有該使用者的 personal access tokens
        // $user->tokens()->delete();
        Auth::logout();

        // 返回登出成功的回應
        return response()->json(['message' => 'Logout successful']);
    }

    // 其他需要的方法...
    public function show()
    {
        return view('welcome');
    }
}
