<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::all();

        $array = [];

        foreach ($events as $event) {
                                    
            $array[] = [
                "id" => $event->id,
                "type" => $event->type,
                "space" => $event->space,
                "service_id" => $event->service_id,                
                "name" => $event->name,
                "date" => $event->date,
                "price" => $event->price,
                "amount" => $event->amount,
                "avatar" => $event->avatar,
                "status" => $event->status,
                "created_at" => $event->created_at,
                "updated_at" => $event->updated_at
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
        $event = new Event;

        //image service
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $destinationPath = 'assets/images/events/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('avatar')->move($destinationPath, $filename);
            $event->avatar = $destinationPath . $filename;
        }

        $event->id_type_event = $request->id_type_event;
        $event->id_space = $request->id_space;
        $event->service_id = $request->service_id;
        $event->name = $request->name;
        $event->date = $request->date;
        $event->price = $request->price;
        $event->amount = $request->amount;
        
        $event->save();

        $data = [
            "message" => "Evento creado con exito",
            "event" => $event
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //        
        $data = [
            "message" => "Evento detail",
            "event" => [
                "id" => $event->id,
                "type" => $event->type,
                "space" => $event->space,
                "service_id" => $event->service_id,
                "tickets" => $event->tickets,
                "name" => $event->name,
                "date" => $event->date,
                "price" => $event->price,
                "amount" => $event->amount,
                "avatar" => $event->avatar,
                "status" => $event->status,
                "created_at" => $event->created_at,
                "updated_at" => $event->updated_at
            ]
            
        ];
        
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //avatar eventos
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $destinationPath = 'assets/images/events/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('avatar')->move($destinationPath, $filename);
            $event->avatar = $destinationPath . $filename;
        }

        $event->id_type_event = $request->id_type_event;
        $event->id_space = $request->id_space;
        $event->service_id = $request->service_id;
        $event->name = $request->name;
        $event->date = $request->date;
        $event->price = $request->price;
        $event->amount = $request->amount;        
        $event->save();

        $data = [
            "message" => "Evento actualizado con exito",
            "event" => $event
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();

        $data = [
            "message" => "Evento eliminado con exito",
            "event" => $event
        ];

        return response()->json($data);
    }
}
