<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Image;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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
            'password' => 'required|confirmed|min:7',
        ]);


        return DB::transaction(function () use ($credentials) {

            $user = User::create([
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => bcrypt($credentials['password']),
            ]);
    
            $profile = Profile::create([
                'user_id' => $user->id,
                'profession' => '',
                'company' => '',
                'about_me' => '',
                'mobile_number' => '',
                'language' => '',
            ]);
    
            Image::create([
                'imageable_id' => $profile->id,
                'imageable_type' => 'App\Models\Profile',
                'url' => 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y',
            ]);

            return response()->json([
                'message' => 'User Created Successfully',
                'data' => $user,
            ], 201);
        });
        
        return response()->json([
            'message' => 'Cannot create your account',
        ], 500);

    }
}
