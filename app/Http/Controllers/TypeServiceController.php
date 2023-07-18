<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $typeServices = TypeService::all();
        return response()->json($typeServices);
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
        $typeService = new TypeService;
        $typeService->ico = $request->ico;
        $typeService->name = $request->name;
        $typeService->description = $request->description;
        $typeService->price = $request->price;
        $typeService->images = $request->images;
        $typeService->public = $request->public;
        $typeService->save();

        $data = [
            'message' => 'Tipo de servicio creado con exito',
            'type_service' => $typeService
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeService $typeService)
    {
        //
        return response()->json($typeService);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeService $typeService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeService $typeService)
    {
        //
        $typeService->ico = $request->ico;
        $typeService->name = $request->name;
        $typeService->description = $request->description;
        $typeService->price = $request->price;
        $typeService->images = $request->images;
        $typeService->public = $request->public;
        $typeService->status = $request->status;
        $typeService->save();

        $data = [
            'message' => 'Tipo de servicio actualizado con exito',
            'typeService' => $typeService
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeService $typeService)
    {
        //
        $typeService->delete();

        $data = [
            'message' => 'Tipo de servicio eliminado con exito',
            'typeService' => $typeService
        ];

        return response()->json($data);
    }
  
}
