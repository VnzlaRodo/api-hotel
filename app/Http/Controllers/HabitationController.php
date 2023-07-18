<?php

namespace App\Http\Controllers;

use App\Models\Habitation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HabitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $habitations = Habitation::all();
        
        return response()->json($habitations);
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
        $habitation = new Habitation;

        $habitation->id_type_habitation = $request->id_type_habitation;
        $habitation->number = $request->number;
        $habitation->adults = $request->adults;
        $habitation->children = $request->children;
        $habitation->description = $request->description;
        $habitation->status = $request->status;
        $habitation->save();

        $data = [
            "message" => "Habitación creada con exito",
            "habitation" => $habitation
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(habitation $habitation)
    {
        //

        return response()->json($habitation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(habitation $habitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, habitation $habitation)
    {
        //
        $habitation->id_type_habitation = $request->id_type_habitation;
        $habitation->lodging_id = $request->lodging_id;
        $habitation->number = $request->number;
        $habitation->adults = $request->adults;
        $habitation->children = $request->children;
        $habitation->description = $request->description;
        $habitation->status = $request->status;
        $habitation->save();

        $data = [
            "message" => "Habitación actualizada con exito",
            "habitation" => $habitation
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(habitation $habitation)
    {
        //
        $habitation->delete();

        $data = [
            "message" => "Habitación eliminada con exito",
            "habitation" => $habitation
        ];

        return response()->json($data);
    }
}
