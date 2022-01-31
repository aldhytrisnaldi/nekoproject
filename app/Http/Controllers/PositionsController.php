<?php

namespace App\Http\Controllers;

use App\Positions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = Positions::all()->sortByDesc('id');
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'position_name'     => 'required|string|unique:positions',
            'division_id'       => 'required|string',
            'status'            => 'required|integer'
        ]);

        $position                   = new Positions;
        $position->position_name    = $request->position_name;
        $position->division_id      = $request->division_id;
        $position->status           = $request->division_id ?  $request->division_id : 0;
        $position->created_by       = Auth::user()->name;
        $position->save();

        if($position)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Position Success!',
                'data'      => $position
            ], 201);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Position Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'position_name'     => 'required|string',
            'division_id'       => 'required|string',
            'status'            => 'required|integer'
        ]);

        $position    = Positions::where('id', $id)->first();

        if($position)
        {
            $position->position_name    = $request->position_name   ?   $request->position_name : $position->position_name;
            $position->division_id      = $request->division_id     ?   $request->division_id   : $position->division_id;
            $position->status           = $request->division_id     ?   $request->division_id   : 0;
            $position->updated_by       = Auth::user()->name;
            $position->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Position Success!',
                'data'      => $position
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Position Failed'
            ], 400);
        }
    }

    public function delete($id)
    {
        $position    = Positions::where('id', $id)->first();

        if($position)
        {
            // $position->delete();
            return response()->json([
                'status'    => true,
                'massage'   => 'Script delete not activate'
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Delete Position ' .$id. ' Failed'
            ], 400);
        }
    }
}
