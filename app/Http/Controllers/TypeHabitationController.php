<?php

namespace App\Http\Controllers;

use App\Models\Type_habitation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeHabitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $type_habitations = Type_habitation::all();

        return response()->json($type_habitations);
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
        $type_habitation = new Type_habitation;

        $type_habitation->name = $request->name;
        $type_habitation->price = $request->price;
        $type_habitation->images = $request->images;
        $type_habitation->save();

        $data = [
            "message" => "Tipo de habitación creado con exito",
            "type_habitation" => $type_habitation
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(type_habitation $type_habitation)
    {
        //

        return response()->json($type_habitation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type_habitation $type_habitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, type_habitation $type_habitation)
    {
        //
        $type_habitation->name = $request->name;
        $type_habitation->price = $request->price;
        $type_habitation->images = $request->images;
        $type_habitation->save();

        $data = [
            "message" => "Tipo de habitación actualizada con exito",
            "type_habitation" => $type_habitation
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(type_habitation $type_habitation)
    {
        //
        $type_habitation->delete();

        $data = [
            "message" => "Tipo de habitación eliminado con exito",
            "type_habitation" => $type_habitation
        ];

        return response()->json($data);
    }
}
