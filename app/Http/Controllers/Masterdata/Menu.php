<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use App\Models\Masterdata\MMenuTables;
use Illuminate\Http\Request;

class Menu extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = MMenuTables::all()->sortByDesc('id');

        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'menu_name'         => 'required|string|unique:m_menu_tables',
            'menu_type_id'      => 'required',
            'parent_id'         => 'nullable',
            'sort'              => 'numeric',
            'route'             => 'required',
            'icon'              => 'nullable',
            'description'       => 'nullable'
        ]);

        $data                      = new MMenuTables;
        $data->menu_name           = $request->menu_name;
        $data->menu_type_id        = $request->menu_type_id;
        $data->parent_id           = $request->parent_id;
        $data->sort                = $request->sort;
        $data->route               = $request->route;
        $data->icon                = $request->icon;
        $data->description         = $request->description;
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

        $data    = MMenuTables::where('id', $id)->first();

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
        $data    = MMenuTables::where('id', $id)->first();

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
