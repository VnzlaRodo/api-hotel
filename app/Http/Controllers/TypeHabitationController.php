<?php

namespace App\Http\Controllers;

use App\Models\TypeHabitation;
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
        $typehabitations = TypeHabitation::all();

        $array = [];

        foreach ($typehabitations as $typehabitation) {

            $images = explode( ',', $typehabitation->images);

            $array[] = [
                "id" => $typehabitation->id,
                "name" => $typehabitation->name,
                "description" => $typehabitation->description,
                "price" => $typehabitation->price,
                "images" => $images,
                "status" => $typehabitation->status,
                "created_at" => $typehabitation->created_at,
                "updated_at" => $typehabitation->updated_at
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
        $typehabitation = new TypeHabitation;

        //image typeahbitation
        if ($request->hasFile('images')){
            $file = $request->file('images');
            $destinationPath = 'img/habitations/types/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('images')->move($destinationPath, $filename);
            $typehabitation->images = $destinationPath . $filename;
        }

        $typehabitation->name = $request->name;
        $typehabitation->description = $request->description;
        $typehabitation->price = $request->price;
        
        $typehabitation->save();

        $data = [
            "message" => "Tipo de habitación creado con exito",
            "typehabitation" => $typehabitation
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeHabitation $typehabitation)
    {
        //

        
        $images = explode( ',', $typehabitation->images);

        $data = [
            "id" => $typehabitation->id,
            "name" => $typehabitation->name,
            "description" => $typehabitation->description,
            "price" => $typehabitation->price,
            "images" => $images,
            "habitations" => $typehabitation->habitations,
            "status" => $typehabitation->status,
            "created_at" => $typehabitation->created_at,
            "updated_at" => $typehabitation->updated_at
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeHabitation $typehabitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeHabitation $typehabitation)
    {
        //
        $typehabitation->name = $request->name;
        $typehabitation->description = $request->description;
        $typehabitation->price = $request->price;
        $typehabitation->images = $request->images;
        $typehabitation->save();

        $data = [
            "message" => "Tipo de habitación actualizada con exito",
            "typehabitation" => $typehabitation
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeHabitation $typehabitation)
    {
        //
        $typehabitation->delete();

        $data = [
            "message" => "Tipo de habitación eliminado con exito",
            "typehabitation" => $typehabitation
        ];

        return response()->json($data);
    }
}
