<?php

namespace App\Http\Controllers;

use App\Models\ServiceExtra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $service_extras = ServiceExtra::all();

        $array = [];

        foreach ($service_extras as $service_extra) {
            
            $array[] = [
                "id" => $service_extra->id,
                "type" => $service_extra->type,
                "service_id" => $service_extra->service_id,
                "description" => $service_extra->description,
                "number" => $service_extra->number,
                "price" => $service_extra->price,
                "status" => $service_extra->status,
                "created_at" => $service_extra->created_at,
                "updated_at" => $service_extra->updated_at
            ];
        }
        return response()->json($array);
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
        $service_extra = new ServiceExtra;
        $service_extra->id_type_service = $request->id_type_service;
        $service_extra->service_id = $request->service_id;
        $service_extra->description = $request->description;
        $service_extra->number = $request->number;
        $service_extra->price = $request->price;
        $service_extra->save();

        $data = [
            "message" => "Servicio extra creado con exito",
            "service_extra" => $service_extra
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceExtra $service_extra)
    {
        //        
        $service = [
            "id" => $service_extra->id,
            "type" => $service_extra->type,
            "service_id" => $service_extra->service_id,
            "description" => $service_extra->description,
            "number" => $service_extra->number,
            "price" => $service_extra->price,
            "status" => $service_extra->status,
            "created_at" => $service_extra->created_at,
            "updated_at" => $service_extra->updated_at
        ];

        $data = [
            "message" => "Servicio extra detail",
            "service_extra" => $service
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceExtra $service_extra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceExtra $service_extra)
    {
        //
        $service_extra->id_type_service = $request->id_type_service;
        $service_extra->service_id = $request->service_id;
        $service_extra->description = $request->description;
        $service_extra->number = $request->number;
        $service_extra->price = $request->price;
        $service_extra->status = $request->status;
        $service_extra->save();

        $data = [
            "message" => "Servicio extra actualizado con exito",
            "service_extra" => $service_extra
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceExtra $service_extra)
    {
        //
        $service_extra->delete();

        $data = [
            "message" => "Servicio extra eliminado con exito",
            "service_extra" => $service_extra
        ];

        return response()->json($data); 
    }
}
