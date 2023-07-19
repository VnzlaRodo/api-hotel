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

        $array = [];

        foreach ($typeServices as $typeService) {

            $images = explode( ',', $typeService->images);
            
            $array[] = [
                "id" => $typeService->id,
                "ico" => $typeService->ico,
                "name" => $typeService->name,
                "description" => $typeService->description,
                "price" => $typeService->price,
                "images" => $images,
                "show" => $typeService->show,
                "status" => $typeService->status,
                "created_at" => $typeService->created_at,
                "updated_at" => $typeService->updated_at
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
        $typeService = new TypeService;

        //ico service
        if ($request->hasFile('ico')){
            $file = $request->file('ico');
            $destinationPath = 'images/services/types/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('ico')->move($destinationPath, $filename);
            $typeService->ico = $destinationPath . $filename;
        }

        //image service
        if ($request->hasFile('images')){
            $file = $request->file('images');
            $destinationPath = 'images/services/types/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('images')->move($destinationPath, $filename);
            $typeService->images = $destinationPath . $filename;
        }
        
        $typeService->name = $request->name;
        $typeService->description = $request->description;
        $typeService->price = $request->price;        
        $typeService->show = $request->show;
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

        $images = explode( ',', $typeService->images);

        $data = [
            "message" => "Tipo de servicio details",
            "typeService" => [
                "id" => $typeService->id,
                "ico" => $typeService->ico,
                "name" => $typeService->name,
                "description" => $typeService->description,
                "price" => $typeService->price,
                "images" => $images,
                "show" => $typeService->show,
                "status" => $typeService->status,
                "created_at" => $typeService->created_at,
                "updated_at" => $typeService->updated_at
            ]
        ];

        return response()->json($data);
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

        //ico service
        if ($request->hasFile('ico')){
            $file = $request->file('ico');
            $destinationPath = 'assets/img/services/type/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('ico')->move($destinationPath, $filename);
            $typeService->ico = $destinationPath . $filename;
        }

        //image service
        if ($request->hasFile('images')){
            $file = $request->file('images');
            $destinationPath = 'images/services/types/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('images')->move($destinationPath, $filename);
            $typeService->images = $destinationPath . $filename;
        }

        
        $typeService->name = $request->name;
        $typeService->description = $request->description;
        $typeService->price = $request->price;
        
        $typeService->show = $request->show;
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
