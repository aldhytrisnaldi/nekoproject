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
            'name'                  => 'required|string',
            'rrn'                   => 'required|string',
            'emn'                   => 'required|string',
            'gender'                => 'required|string',
            'religion'              => 'required|string',
            'height'                => 'required|string',
            'weight'                => 'required|string',
            'placeofbirth'          => 'required|string',
            'dateofbirth'           => 'required',
            'marriage_status'       => 'required|string',
            'number_of_children'    => 'string',
            'last_education'        => 'required|string',
            'province'              => 'required|string',
            'city'                  => 'required|string',
            'districts'             => 'required|string',
            'subdistricts'          => 'required|string',
            'address'               => 'required|min:10|max:200',
            'phone'                 => 'required|min:10|max:20|unique:persons',
            'email'                 => 'required|email|unique:persons',
            'departement_id'        => 'required|string',
            'division_id'           => 'required|string',
            'position_id'           => 'required|string',
        ]);

        $persons                        = new Persons;
        $persons->name                  = $request->name;
        $persons->rrn                   = $request->rrn;
        $persons->emn                   = $request->emn;
        $persons->gender                = $request->gender;
        $persons->religion              = $request->religion;
        $persons->height                = $request->height;
        $persons->weight                = $request->weight;
        $persons->placeofbirth          = $request->placeofbirth;
        $persons->dateofbirth           = $request->dateofbirth;
        $persons->marriage_status       = $request->marriage_status;
        $persons->number_of_children    = $request->number_of_children;
        $persons->last_education        = $request->last_education;
        $persons->province              = $request->province;
        $persons->city                  = $request->city;
        $persons->districts             = $request->districts;
        $persons->subdistricts          = $request->subdistricts;
        $persons->address               = $request->address;
        $persons->phone                 = $request->phone;
        $persons->email                 = $request->email;
        $persons->departement_id        = $request->departement_id;
        $persons->division_id           = $request->division_id;
        $persons->position_id           = $request->position_id;
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
                'message'   =>'Add Persons Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $persons    = Persons::where('id', $id)->first();
        
        if($persons)
        {
            $persons->name                      = $request->name                    ? $request->name                    : $persons->name;
            $persons->rrn                       = $request->rrn                     ? $request->rrn                     : $persons->rrn;
            $persons->emn                       = $request->emn                     ? $request->emn                     : $persons->emn;
            $persons->gender                    = $request->gender                  ? $request->gender                  : $persons->gender;
            $persons->religion                  = $request->religion                ? $request->religion                : $persons->religion;
            $persons->height                    = $request->height                  ? $request->height                  : $persons->height;
            $persons->weight                    = $request->weight                  ? $request->weight                  : $persons->weight;
            $persons->placeofbirth              = $request->placeofbirth            ? $request->placeofbirth            : $persons->placeofbirth;
            $persons->dateofbirth               = $request->dateofbirth             ? $request->dateofbirth             : $persons->dateofbirth;
            $persons->marriage_status           = $request->marriage_status         ? $request->marriage_status         : $persons->marriage_status;
            $persons->number_of_children        = $request->number_of_children      ? $request->number_of_children      : $persons->number_of_children;
            $persons->last_education            = $request->last_education          ? $request->last_education          : $persons->last_education;
            $persons->province                  = $request->province                ? $request->province                : $persons->province;
            $persons->city                      = $request->city                    ? $request->city                    : $persons->city;
            $persons->districts                 = $request->districts               ? $request->districts               : $persons->districts;
            $persons->subdistricts              = $request->subdistricts            ? $request->subdistricts            : $persons->subdistricts;
            $persons->address                   = $request->address                 ? $request->address                 : $persons->address;
            $persons->phone                     = $request->phone                   ? $request->phone                   : $persons->phone;
            $persons->email                     = $request->email                   ? $request->email                   : $persons->email;
            $persons->departement_id            = $request->departement_id          ? $request->departement_id          : $persons->departement_id;
            $persons->division_id               = $request->division_id             ? $request->division_id             : $persons->division_id;
            $persons->position_id               = $request->position_id             ? $request->position_id             : $persons->position_id;
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
                'massage'   => 'Update Persons Failed'
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
