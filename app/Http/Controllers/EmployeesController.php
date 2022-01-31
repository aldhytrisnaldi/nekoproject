<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = Employees::all()->sortByDesc('id');
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function getById($id)
    {
        $data   = Employees::where('id',$id)->get()->first();
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
                'message'   => 'Employee Not Found!'
            ], 404);
        }
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|string',
            'rin'                   => 'required|string|unique:employees',
            'ein'                   => 'required|string|unique:employees',
            'gender'                => 'required|string',
            'religion'              => 'required|string',
            'height'                => 'required|string',
            'weight'                => 'required|string',
            'placeofbirth'          => 'required|string',
            'dateofbirth'           => 'required',
            'marriage_status'       => 'required|string',
            'number_of_children'    => 'string',
            'province'              => 'required|string',
            'city'                  => 'required|string',
            'districts'             => 'required|string',
            'subdistricts'          => 'required|string',
            'address'               => 'required|min:10|max:200',
            'phone'                 => 'required|min:10|max:20|unique:employees',
            'email'                 => 'required|email|unique:employees',
            'departement_id'        => 'required|string',
            'division_id'           => 'required|string',
            'position_id'           => 'required|string',
        ]);

        $employees                        = new Employees;
        $employees->name                  = $request->name;
        $employees->rin                   = $request->rin;
        $employees->ein                   = $request->ein;
        $employees->gender                = $request->gender;
        $employees->religion              = $request->religion;
        $employees->height                = $request->height;
        $employees->weight                = $request->weight;
        $employees->placeofbirth          = $request->placeofbirth;
        $employees->dateofbirth           = $request->dateofbirth;
        $employees->marriage_status       = $request->marriage_status;
        $employees->number_of_children    = $request->number_of_children;
        $employees->province              = $request->province;
        $employees->city                  = $request->city;
        $employees->districts             = $request->districts;
        $employees->subdistricts          = $request->subdistricts;
        $employees->address               = $request->address;
        $employees->phone                 = $request->phone;
        $employees->email                 = $request->email;
        $employees->departement_id        = $request->departement_id;
        $employees->division_id           = $request->division_id;
        $employees->position_id           = $request->position_id;
        $employees->save();

        if($employees)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Employee Success!',
                'data'      => $employees
            ], 201);
        }

        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Employee Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $employees    = Employees::where('id', $id)->first();

        if($employees)
        {
            $employees->name                      = $request->name                    ? $request->name                    : $employees->name;
            $employees->rin                       = $request->rin                     ? $request->rin                     : $employees->rin;
            $employees->ein                       = $request->ein                     ? $request->ein                     : $employees->ein;
            $employees->gender                    = $request->gender                  ? $request->gender                  : $employees->gender;
            $employees->religion                  = $request->religion                ? $request->religion                : $employees->religion;
            $employees->height                    = $request->height                  ? $request->height                  : $employees->height;
            $employees->weight                    = $request->weight                  ? $request->weight                  : $employees->weight;
            $employees->placeofbirth              = $request->placeofbirth            ? $request->placeofbirth            : $employees->placeofbirth;
            $employees->dateofbirth               = $request->dateofbirth             ? $request->dateofbirth             : $employees->dateofbirth;
            $employees->marriage_status           = $request->marriage_status         ? $request->marriage_status         : $employees->marriage_status;
            $employees->number_of_children        = $request->number_of_children      ? $request->number_of_children      : $employees->number_of_children;
            $employees->province                  = $request->province                ? $request->province                : $employees->province;
            $employees->city                      = $request->city                    ? $request->city                    : $employees->city;
            $employees->districts                 = $request->districts               ? $request->districts               : $employees->districts;
            $employees->subdistricts              = $request->subdistricts            ? $request->subdistricts            : $employees->subdistricts;
            $employees->address                   = $request->address                 ? $request->address                 : $employees->address;
            $employees->phone                     = $request->phone                   ? $request->phone                   : $employees->phone;
            $employees->email                     = $request->email                   ? $request->email                   : $employees->email;
            $employees->departement_id            = $request->departement_id          ? $request->departement_id          : $employees->departement_id;
            $employees->division_id               = $request->division_id             ? $request->division_id             : $employees->division_id;
            $employees->position_id               = $request->position_id             ? $request->position_id             : $employees->position_id;
            $employees->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Employee Success!',
                'data'      => $employees
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Employee Failed'
            ], 400);
        }
    }
}
