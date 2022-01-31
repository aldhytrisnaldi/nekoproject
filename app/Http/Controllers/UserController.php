<?php

namespace App\Http\Controllers;

use App\User;
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
                'message'   => 'user not found!'
            ], 404);
        }
    }
}
