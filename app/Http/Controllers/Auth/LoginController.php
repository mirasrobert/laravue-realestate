<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __invoke()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid Email & Password'], 403);
        }

        return response()->json(compact('token'));
    }
}
