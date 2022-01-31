<?php

namespace App\Http\Controllers;

use App\MdEmployeeStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MdEmployeeStatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = MdEmployeeStatuses::all()->sortByDesc('id');
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'employee_status_name'  => 'required|string|unique:md_employee_statuses',
            'status'                => 'required|integer'
        ]);

        $edu                        = new MdEmployeeStatuses;
        $edu->employee_status_name  = $request->employee_status_name;
        $edu->status                = $request->status  ?   $request->status  : 0;
        $edu->created_by            = Auth::user()->name;
        $edu->save();

        if($edu)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Employee Status Success!',
                'data'      => $edu
            ], 201);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Employee Status Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'employee_status_name'  => 'required|string',
            'status'                => 'required|integer'
        ]);

        $edu    = MdEmployeeStatuses::where('id', $id)->first();

        if($edu)
        {
            $edu->employee_status_name  = $request->employee_status_name    ?   $request->employee_status_name  : $edu->employee_status_name;
            $edu->status                = $request->status                  ?   $request->status                : 0;
            $edu->updated_by            = Auth::user()->name;
            $edu->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Employee Status Success!',
                'data'      => $edu
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Employee Status Failed'
            ], 400);
        }
    }

    public function delete($id)
    {
        $edu    = MdEmployeeStatuses::where('id', $id)->first();

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
                'massage'   => 'Delete Employee Status ' .$id. ' Failed'
            ], 400);
        }
    }
}
