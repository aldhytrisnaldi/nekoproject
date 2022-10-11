<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function getAll()
    {
         return response()->json([
             'status'   => true,
             'users'    =>  User::all()->sortByDesc('id')
        ], 200);
    }

    public function getById($id)
    {
        try
        {
            $user = User::findOrFail($id);
            return response()->json([
                'status'    => true,
                'user'      => $user
            ], 200);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status'    => false,
                'message'   => 'User not found!'
            ], 404);
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|max:30',
            'status'    => 'integer'
        ]);

        $name       = $request->input('name');
        $email      = $request->input('email');
        $status     = $request->input('status');
        $password   = Hash::make($request->input('password'));
        $register   = User::create([
            'name'      => $name,
            'email'     => $email,
            'password'  => $password,
            'status'    => $status
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
}
