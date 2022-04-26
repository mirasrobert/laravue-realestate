<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * User
 *
 * @mixin Eloquent
 */

class RegisterController extends Controller
{
    public function __invoke()
    {
        $credentials = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return User::create($credentials);
    }
}
