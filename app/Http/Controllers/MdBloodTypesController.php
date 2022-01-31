<?php

namespace App\Http\Controllers;

use App\MdBloodTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MdBloodTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = MdBloodTypes::all()->sortByDesc('id');
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'blood_type_name'   => 'required|string|unique:md_blood_types',
            'status'            => 'required|integer'
        ]);

        $bot                        = new MdBloodTypes;
        $bot->blood_type_name       = $request->blood_type_name;
        $bot->status                = $request->status  ?   $request->status  : 0;
        $bot->created_by            = Auth::user()->name;
        $bot->save();

        if($bot)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Blood Type Success!',
                'data'      => $bot
            ], 201);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Blood Type Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'blood_type_name'   => 'required|string',
            'status'            => 'required|integer'
        ]);

        $bot    = MdBloodTypes::where('id', $id)->first();

        if($bot)
        {
            $bot->blood_type_name   = $request->blood_type_name     ?   $request->blood_type_name   : $bot->blood_type_name;
            $bot->status            = $request->status              ?   $request->status            : 0;
            $bot->updated_by        = Auth::user()->name;
            $bot->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Blood Type Success!',
                'data'      => $bot
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Blood Type Failed'
            ], 400);
        }
    }

    public function delete($id)
    {
        $bot    = MdBloodTypes::where('id', $id)->first();

        if($bot)
        {
            // $bot->delete();
            return response()->json([
                'status'    => true,
                'massage'   => 'Script delete not activate'
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Delete Blood Type ' .$id. ' Failed'
            ], 400);
        }
    }
}
