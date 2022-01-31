<?php

namespace App\Http\Controllers;

use App\Departements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }

    public function get()
    {
        $data   = Departements::all()->sortByDesc('id');
        return response()->json([
            'status'    => true,
            'data'      => $data
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'departement_name'  => 'required|string|unique:departements',
            'status'            => 'required|integer'
        ]);

        $departement                        = new Departements;
        $departement->departement_name      = $request->departement_name;
        $departement->status                = $request->status  ?   $request->status  : 0;
        $departement->created_by            = Auth::user()->name;
        $departement->save();

        if($departement)
        {
            return response()->json([
                'status'    => true,
                'message'   =>'Add Departement Success!',
                'data'      => $departement
            ], 201);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   =>'Add Departement Failed!',
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'departement_name'  => 'required|string',
            'status'            => 'required|integer'
        ]);

        $departement    = Departements::where('id', $id)->first();

        if($departement)
        {
            $departement->departement_name  = $request->departement_name    ?   $request->departement_name  : $departement->departement_name;
            $departement->status            = $request->status              ?   $request->status            : 0;
            $departement->updated_by        = Auth::user()->name;
            $departement->save();

            return response()->json([
                'status'    => true,
                'massage'   => 'Update Departement Success!',
                'data'      => $departement
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Update Departement Failed'
            ], 400);
        }
    }

    public function delete($id)
    {
        $departement    = Departements::where('id', $id)->first();

        if($departement)
        {
            $departement->delete();
            return response()->json([
                'status'    => true,
                'massage'   => 'Delete Departement ' .$id. ' Success'
            ], 200);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'massage'   => 'Delete Departement ' .$id. ' Failed'
            ], 400);
        }
    }
}
