<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use App\Models\Masterdata\MMenuTypeTables;
use Illuminate\Http\Request;

class MenuType extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = MMenuTypeTables::all()->sortByDesc('id');

        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'menu_type_name'  => 'required|string|unique:m_menu_type_tables'
        ]);

        $data                      = new MMenuTypeTables;
        $data->menu_type_name      = $request->menu_type_name;
        $data->save();

        if($data)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Data Success!',
                'data'      => $data
            ], 201);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Data Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'menu_type_name'  => 'required|string'
        ]);

        $data    = MMenuTypeTables::where('id', $id)->first();

        if($data)
        {
            $data->menu_type_name  = $request->menu_type_name ? $request->menu_type_name : $data->menu_type_name;
            $data->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Data Success!',
                'data'      => $data
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Data Failed'
            ], 400);
        }
    }

    public function delete($id)
    {
        $data    = MMenuTypeTables::where('id', $id)->first();

        if($data)
        {
            $data->delete();
            return response()->json([
                'status'    => true,
                'massage'   => 'Delete Data ' .$id. ' Success'
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Delete Data ' .$id. ' Failed'
            ], 400);
        }
    }
}
