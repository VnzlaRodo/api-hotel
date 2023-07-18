<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $spaces = Space::all();

        return response()->json($spaces);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $space = new Space;
        $space->name = $request->name;
        $space->size = $request->size;
        $space->amount = $request->amount;
        $space->images = $request->images;
        $space->save();

        $data = [
            "message" => "Espacio creado con exito",
            "space" => $space
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Espace $space)
    {
        //

        return response()->json($space);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Espace $space)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Espace $space)
    {
        //
        $space->name = $request->name;
        $space->size = $request->size;
        $space->amount = $request->amount;
        $space->images = $request->images;
        $space->save();

        $data = [
            "message" => "Espacio actualizado con exito",
            "space" => $space
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Espace $space)
    {
        //
        $space->delete();

        $data = [
            "message" => "Espacio eliminado con exito",
            "space" => $space
        ];

        return response()->json($data);
    }
}
