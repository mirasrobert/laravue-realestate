<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $token = $request->header('Authorization');

        try {
            JWTAuth::parseToken()->invalidate($token);
            // Pass true to force the token to be blacklisted "forever"
            auth()->invalidate(true);
            auth()->logout(true);


            return response()->json(['error' => false, 'message' => 'Successfully logged out']);

        } catch (TokenExpiredException $exception) {
            return response()->json([
                'error' => true,
                'message' => trans('Token is expired')

            ], 401);
        } catch (TokenInvalidException $exception) {
            return response()->json([
                'error' => true,
                'message' => trans('Token is invalid')
            ], 401);

        } catch (JWTException $exception) {
            return response()->json([
                'error' => true,
                'message' => trans('No token, unauthenticated')
            ], 500);
        }
    }
}
