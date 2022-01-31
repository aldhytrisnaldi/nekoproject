<?php

namespace App\Http\Controllers;

use App\MdGenders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MdGendersController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = MdGenders::all()->sortByDesc('id');
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'gender_name'   => 'required|string|unique:md_genders',
            'status'        => 'required|integer'
        ]);

        $edu                 = new MdGenders;
        $edu->gender_name    = $request->gender_name;
        $edu->status         = $request->status  ?  $request->status  : 0;
        $edu->created_by     = Auth::user()->name;
        $edu->save();

        if($edu)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Gender Success!',
                'data'      => $edu
            ], 201);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Gender Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'gender_name'    => 'required|string',
            'status'         => 'required|integer'
        ]);

        $edu    = MdGenders::where('id', $id)->first();

        if($edu)
        {
            $edu->gender_name    = $request->gender_name    ?   $request->gender_name   : $edu->gender_name;
            $edu->status         = $request->status         ?   $request->status        : 0;
            $edu->updated_by     = Auth::user()->name;
            $edu->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Gender Success!',
                'data'      => $edu
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Gender Failed'
            ], 400);
        }
    }

    public function delete($id)
    {
        $edu    = MdGenders::where('id', $id)->first();

        if($edu)
        {
            // $edu->delete();
            return response()->json([
                'status'    => true,
                'massage'   => 'Script delete not activate'
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Delete Gender ' .$id. ' Failed'
            ], 400);
        }
    }
}
