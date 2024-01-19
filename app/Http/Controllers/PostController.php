<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

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

        // 獲取 JSON 字串
        $col1 = $request->json("col1");

        // 將 JSON 字串轉換為關聯數組
        // $dataArray = json_decode($jsonString, true);



        // return view('home');
        $data = ['message' => 'Login successful', 'token' => 'your_access_token', 'post' => $request->post, 'user:' => $user, 'col1' => $col1];
        $jsonString = json_encode($data);

        echo $jsonString;
    }

    public function index2(Request $request)
    {
        $user = Auth::user();
        // echo "user: $user";
        dump($user);
    }

    public function index3(Request $request,Post $post)
    {
        // !allows = 拒絕 = denies
        if(!Gate::allows('view-post', $post)){
            abort(403);
        }
        return $post;
    }
}
