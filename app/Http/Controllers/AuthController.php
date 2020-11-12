<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Tymon\JWTAuth\exceptions\JWTException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:10|max:20',
        ]);

        $name       = $request->input('name');
        $email      = $request->input('email');
        $password   = Hash::make($request->input('password'));
        $register   = User::create([
            'name'      => $name,
            'email'     => $email,
            'password'  => $password
        ]);

        if($register)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Register Success!',
                'data'      => $register
            ], 201);
        }

        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Register Fail!',
                'data'      => ''
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'         => 'required|string',
            'password'      => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
           'token' => 'required'
        ]);
        try
        {
            Auth::invalidate($request->token);
            return response()->json([
                'status'    => true,
                'message'   => 'Logout Success!'
            ]);
        }
        catch (JWTException $exception)
        {
            return response()->json([
                'status'    => false,
                'message'   => 'Ops, Logout Failed!'
            ]);
        }
    }
}
