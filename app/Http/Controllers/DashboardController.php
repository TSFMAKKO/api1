<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    
    // use AuthorizesRequests, ValidatesRequests;
    public function index(){
        // echo "dashboard";
        // return response()->json(['message' => 'Logout successful']);
        return [
            "user"=>Auth::user()
        ];
    }
}
