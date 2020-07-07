<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function login()
    {
        // $test = auth()->attempt(['email' => 'test@gmail.com', 'password' => 'secret']);
        // dd($test);
        $user = auth()->guard('sanctum')->user();
        dd('user', $user);
        dd('in login');
    }
}
