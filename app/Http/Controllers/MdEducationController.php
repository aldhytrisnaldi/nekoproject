<?php

namespace App\Http\Controllers;

use App\MdEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MdEducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = MdEducation::all()->sortByDesc('id');
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'education_name'    => 'required|string|unique:md_education',
            'status'            => 'required|integer'
        ]);

        $edu                    = new MdEducation;
        $edu->education_name    = $request->education_name;
        $edu->status            = $request->status  ?   $request->status  : 0;
        $edu->created_by        = Auth::user()->name;
        $edu->save();

        if($edu)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Education Success!',
                'data'      => $edu
            ], 201);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Education Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'education_name'    => 'required|string',
            'status'            => 'required|integer'
        ]);

        $edu    = MdEducation::where('id', $id)->first();

        if($edu)
        {
            $edu->education_name    = $request->education_name ?   $request->education_name   : $edu->education_name;
            $edu->status            = $request->status    ?   $request->status      : 0;
            $edu->updated_by        = Auth::user()->name;
            $edu->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Education Success!',
                'data'      => $edu
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Education Failed'
            ], 400);
        }
    }

    public function delete($id)
    {
        $edu    = MdEducation::where('id', $id)->first();

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
                'massage'   => 'Delete Education ' .$id. ' Failed'
            ], 400);
        }
    }
}
