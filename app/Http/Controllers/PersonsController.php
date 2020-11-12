<?php

namespace App\Http\Controllers;

use App\Persons;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = Persons::all();
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function getById($id)
    {
        $data   = Persons::where('id',$id)->get()->first();
        if($data)
        {
            return response()->json([
                'status'    => true,
                'data'      => $data
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   => 'Person Not Found!'
            ], 404);
        }
    }
    
    public function add(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'phone'             => 'required|string|min:10|max:20',
            'placeofbirth'      => 'required|string',
            'dateofbirth'       => 'required',
            'address'           => 'required|min:10|max:200',
        ]);

        $persons                = new Persons;
        $persons->name          = $request->name;
        $persons->phone         = $request->phone;
        $persons->placeofbirth  = $request->placeofbirth;
        $persons->dateofbirth   = $request->dateofbirth;
        $persons->address       = $request->address;
        $persons->save();

        if($persons)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Persons Success!',
                'data'      => $persons
            ], 201);
        }

        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Persons Fail!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $persons    = Persons::where('id', $id)->first();
        
        if($persons)
        {
            $persons->name          = $request->name            ? $request->name            : $persons->name;
            $persons->phone         = $request->phone           ? $request->phone           : $persons->phone;
            $persons->placeofbirth  = $request->placeofbirth    ? $request->placeofbirth    : $persons->placeofbirth;
            $persons->dateofbirth   = $request->dateofbirth     ? $request->dateofbirth     : $persons->dateofbirth;
            $persons->address       = $request->address         ? $request->address         : $persons->address;
            $persons->save();
            
            return response()->json([
                'status'    => true,
                'massage'   => 'Update Persons Success!',
                'data'      => $persons
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Persons Failded'
            ], 400);
        }
    }

    public function delete($id)
    {
        $persons    = Persons::where('id', $id)->first();

        if($persons)
        {
            $persons->delete();
            return response()->json([
                'status'    => true,
                'massage'   => 'Delete Persons ' .$id. ' Success'
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Delete Persons ' .$id. ' Failed'
            ], 400);
        }
    }
}
