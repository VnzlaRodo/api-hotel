<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LodgingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lodgings = Lodging::all();

        $array = [];
        foreach ($lodgings as $lodging) {
            $array[] = [
                "id" => $lodging->id,
                "id_client" => $lodging->id_client,
                "id_user" => $lodging->id_user,
                "habitations" => $lodging->habitations,
                "checkin" => $lodging->checkin,
                "checkout" => $lodging->checkout,
                "adults" => $lodging->adults,
                "children" => $lodging->children,
                "price" => $lodging->price,
                "status" => $lodging->status,
                "created_at" => $lodging->created_at,
                "updated_at" => $lodging->updated_at
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
        $lodging = new Lodging;
        $lodging->id_client = $request->id_client;
        $lodging->id_user = $request->id_user;
        $lodging->service_id = $request->service_id;
        $lodging->checkin = $request->checkin;
        $lodging->checkout = $request->checkout;
        $lodging->adults = $request->adults;
        $lodging->children = $request->children;
        $lodging->price = $request->price;
        $lodging->save();

        $data = [
            "message" => "Hospedaje creado con exito",
            "lodging" => $lodging
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lodging $lodging)
    {
        //
        $data = [
            "message" => "Hospedaje details",
            "loadging" => $lodging,
            "habitations" => $lodging->habitations
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lodging $lodging)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lodging $lodging)
    {
        //
        $lodging->service_id = $request->service_id;
        $lodging->checkin = $request->checkin;
        $lodging->checkout = $request->checkout;
        $lodging->adults = $request->adults;
        $lodging->children = $request->children;
        $lodging->price = $request->price;
        $lodging->save();

        $data = [
            "message" => "Hospedaje actualizado con exito",
            "lodging" => $lodging
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lodging $lodging)
    {
        //
        $lodging->delete();

        $data = [
            "message" => "Hospedaje eliminado con exito",
            "lodging" => $lodging
        ];

        return response()->json($data);
    }


}
