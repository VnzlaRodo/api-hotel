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

        $array = [];

        foreach ($spaces as $space) {

            $images = explode( ',', $space->images);

            $array[] = [
                "id" => $space->id,
                "name" => $space->name,
                "description" => $space->description,
                "size" => $space->size,
                "amount" => $space->amount,
                "images" => $images,
                "status" => $space->status,
                "created_at" => $space->created_at,
                "updated_at" => $space->updated_at
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
        $space = new Space;

         //image spaces
         if ($request->hasFile('images')){
            $file = $request->file('images');
            $destinationPath = 'img/spaces/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('images')->move($destinationPath, $filename);
            $space->images = $destinationPath . $filename;
        }

        $space->name = $request->name;
        $space->description = $request->description;
        $space->size = $request->size;
        $space->amount = $request->amount;
        
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
    public function show(Space $space)
    {
        //

        $images = explode( ',', $space->images);

        $data = [
            "message" => "Espacio detail",
            "space" => [
                "id" => $space->id,
                "name" => $space->name,
                "description" => $space->description,
                "size" => $space->size,
                "amount" => $space->amount,
                "images" => $images,
                "status" => $space->status,
                "created_at" => $space->created_at,
                "updated_at" => $space->updated_at
            ]
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Space $space)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Space $space)
    {
        //
        
        //image spaces
        if ($request->hasFile('images')){
            $file = $request->file('images');
            $destinationPath = 'img/spaces/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('images')->move($destinationPath, $filename);
            $space->images = $destinationPath . $filename;
        }

        $space->name = $request->name;
        $space->description = $request->description;
        $space->size = $request->size;
        $space->amount = $request->amount;
        
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
    public function destroy(Space $space)
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
