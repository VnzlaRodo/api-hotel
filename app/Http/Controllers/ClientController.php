<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all();
        //create object to store data
        $array = [];
        foreach ($clients as $client) {

            $array_services = [];

            foreach ($client->services as $services) {
                $array_services[] = [
                    "id" => $services->id,
                    "type" => $services->type_services,
                    "price" => $services->price,
                    "description" => $services->description,
                    "status" => $services->status,
                    "created_at" => $services->created_at,
                    "updated_at" => $services->updated_at
                ];
            }

            $array[] = [
                "id" => $client->id,
                "cedula" => $client->cedula,
                "name" => $client->name,
                "lastname" => $client->lastname,
                "email" => $client->email,
                "phone" => $client->phone,
                "address" => $client->address,
                "avatar" => $client->avatar,
                "status" => $client->status,
                "services" => $array_services,
                "created_at" => $client->created_at,
                "updated_at" => $client->updated_at
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
        $client = new Client;

         //avatar client
         if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $destinationPath = 'img/clients/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('avatar')->move($destinationPath, $filename);
            $client->avatar = $destinationPath . $filename;
        }


        $client->cedula = $request->cedula;
        $client->name = $request->name;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        
        $client->save();

        $data = [
            'message' => 'Cliente creado con exito',
            'client'  => $client
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //  
        $array = [];
        foreach ($client->services as $services) {
            $array[] = [
                "id" => $services->id,
                "type" => $services->type_services,
                "price" => $services->price,
                "description" => $services->description,
                "status" => $services->status,
                "created_at" => $services->created_at,
                "updated_at" => $services->updated_at
            ];
        }
        
        $data = [
            'message' => 'Client details',
            'client' => [
                "id" => $client->id,
                "cedula" => $client->cedula,
                "name" =>$client->name,
                "lastname" => $client->lastname,
                "email" => $client->email,
                "phone" => $client->phone,
                "address" => $client->address,
                "avatar" => $client->avatar,
                "status" => $client->status,
                "services" => $array,
                "created_at" => $client->created_at,
                "updated_at" => $client->updated_at
            ],
            
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //    
        
         //avatar client
         if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $destinationPath = 'img/clients/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('avatar')->move($destinationPath, $filename);
            $client->avatar = $destinationPath . $filename;
        }
        
        $client->cedula = $request->cedula;
        $client->name = $request->name;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        
        $client->save();

        $data = [
            'message' => 'Cliente actualizado con exito',
            'client'  => $client
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();

        $data = [
            'message' => 'Cliente eliminado con exito',
            'client'  => $client
        ];

        return response()->json($data);
    }

    public function attach(Request $request){

        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);
        $data = [
            "message" => "Servicio attached exitoso",
            "client" => $client
        ];

        return response()->json($data);
    }

    public function detach(Request $request){
        $client = Client::find($request->client_id);
        $client->services()->detach($request->service_id);
        $data =  [
            'message' => 'Servicio detach con extio',
            'client' => $client
        ];

        return response()->json($data);
    }
}
