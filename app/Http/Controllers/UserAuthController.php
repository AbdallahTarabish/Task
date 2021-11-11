<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "email" => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return error("Failed",
                $validator->errors()->first()
            );
        }

        $credentials = $request->only("email", 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return responseWithToken($token);
        }

        return error('Unauthorized');
    }
    public function guard()
    {
        return Auth::guard('api');
    }

}
