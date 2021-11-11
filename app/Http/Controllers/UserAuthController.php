<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {

        $identify = request()->identify;
        $field_name = filter_var($identify, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        request()->merge([$field_name => $identify]);

        $validator = Validator::make($request->all(), [
            $field_name => 'required',
            'password' => 'required',
            'device_id' => 'required',
        ]);

        if ($validator->fails()) {
            return error(
                $validator->errors()->first(),
            );
        }

        $credentials = $request->only($field_name, 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return responseWithToken($token);
        }

        return error('Unauthorized');
    }
}
