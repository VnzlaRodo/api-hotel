<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TypeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::all();

        $array = [];
        foreach ($services as $service) {
                        
            $array[] = [
                'id' => $service->id,
                'type' => $service->type_services,
                "lodging" => $service->lodging,
                "event" => $service->event,
                "service_extra" => $service->service_extra,
                'price' => $service->price,
                'status' => $service->status,
                'created_at' => $service->created_at,
                'updated_at' => $service->updated_at
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
        $service = new Service;
        $service->id_type_service = $request->id_type_service;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();

        $data = [
            "message" => "Servicio creado con exito",
            "service" => $service
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //    
        $data = [
            "id" => $service->id,
            "type" => $service->type_services,
            "lodging" => $service->lodging,
            "event" => $service->event,
            "service_extra" => $service->service_extra,
            "price" => $service->price,
            "description" => $service->description,
            "status" => $service->status,
            "created_at" => $service->created_at,
            "updated_at" => $service->updated_at
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
        $service->price = $request->price;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();

        $data = [
            "message" => "Servicio actualizado con exito",
            "service" => $service
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();

        $data = [
            "message" => "Servicio eliminado con exito",
            "service" => $service
        ];

        return response()->json($data);
    }

    public function clients(Request $request){
        $service = Service::find($request->service_id);
        $clients = $service->clients;
        $data = [
            'message' => 'Clientes fetched',
            'clients' => $clients
        ];

        return response()->json($data);
    }
    
}
