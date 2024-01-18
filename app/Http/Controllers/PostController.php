<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:sanctum');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // return view('home');
        $data = ['message' => 'Login successful', 'token' => 'your_access_token', 'post' => $request->post, 'user:' => $user];
        $jsonString = json_encode($data);

        echo $jsonString;
    }
}
