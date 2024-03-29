<?php

namespace App\Http\Controllers;

use App\Models\TypeEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $type_events = TypeEvent::all();

        return response()->json($type_events);
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
        $type_event = new TypeEvent;
        $type_event->name = $request->name;
        $type_event->save();

        $data = [
            "message" => "Tipo de evento creado con exito",
            "type_event" => $type_event
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeEvent $type_event)
    {
        //
        return response()->json($type_event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeEvent $type_event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeEvent $type_event)
    {
        //
        $type_event->name = $request->name;
        $type_event->save();

        $data = [
            "message" => "Tipo de evento actualizado con exito",
            "type_event" => $type_event
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeEvent $type_event)
    {
        //
        $type_event->delete();

        $data = [
            "message" => "Tipo de evento eliminado con exito",
            "type_event" => $type_event
        ];

        return response()->json($data);
    }
}
