<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function login()
    {
        $attempt = auth()->attempt(['email' => 'test@gmail.com', 'password' => 'secret']);
        return response()->json($attempt);
    }

    public function logout()
    {
        return response()->json(auth()->logout());
    }
}
