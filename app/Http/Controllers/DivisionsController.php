<?php

namespace App\Http\Controllers;

use App\Divisions;
use Illuminate\Http\Request;

class DivisionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = Divisions::all()->sortByDesc('id');
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'division_name'     => 'required|string',
            'departement_id'    => 'required|string',
        ]);

        $division                   = new Divisions;
        $division->division_name    = $request->division_name;
        $division->departement_id   = $request->departement_id;
        $division->save();

        if($division)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Division Success!',
                'data'      => $division
            ], 201);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Division Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $division    = Divisions::where('id', $id)->first();
        if($division)
        {
            $division->division_name    = $request->division_name   ?   $request->division_name     :   $division->division_name;
            $division->departement_id   = $request->departement_id  ?   $request->departement_id    :   $division->departement_id;
            $division->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Division Success!',
                'data'      => $division
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Division Failed'
            ], 400);
        }
    }

    public function delete($id)
    {
        $division    = Divisions::where('id', $id)->first();

        if($division)
        {
            $division->delete();
            return response()->json([
                'status'    => true,
                'massage'   => 'Delete Division ' .$id. ' Success'
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Delete Division ' .$id. ' Failed'
            ], 400);
        }
    }
}
