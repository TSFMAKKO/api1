<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 登入 (傳統混用+token)
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

            $expiry = time() + (1440 * 60);  // 有效期一天

            // 使用原生 setcookie 函數設定 cookie
            // 要用Oauth2一定要把httpOnly設為false(js可讀取的意思)
            // credentials: 'include', 會包含httpOnly
            setcookie('access_token', $token, $expiry, '/', '', false, false);

            // $cookie = cookie('access_token00000', $token, 1440);
            return response()->json(['message' => 'Login successful', 'token' => $token]);
            // ->withCookie($cookie);
        }

        // 登入失敗，返回相應的錯誤回應
        // return response()->json(['message' => 'Invalid credentials'], 401);
        throw ValidationException::withMessages(['email' => 'Invalid credentials']);
    }

    // 登入 (api/fetch專用)
    public function login2(Request $request)
    {
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        $user = User::where('email', $request->json('email'))->first();

        $token = $user->createToken('app-token2')->plainTextToken;

        $expiry = time() + (1440 * 60);  // 有效期一天

        // 使用原生 setcookie 函數設定 cookie
        // 要用Oauth2一定要把httpOnly設為false(js可讀取的意思)
        // credentials: 'include', 會包含httpOnly
        setcookie('access_token', $token, $expiry, '/', '', false, false);
        if (Hash::check($request->json('password'), $user->getAuthPassword())) {
            return [
                'token' => $token
            ];
        }
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


        // 登出
        public function logout2()
        {
            // 獲取當前認證的使用者
            // $user = Auth::user();
    
            // 撤銷所有該使用者的 personal access tokens
            // $user->tokens()->delete();
            // Auth::logout();

            auth()->user()->currentAccessToken()->delete();
    
            // 返回登出成功的回應
            return response()->json(['message' => 'Logout successful']);
        }
    // 其他需要的方法...
    public function show()
    {
        return view('welcome');
    }
}
