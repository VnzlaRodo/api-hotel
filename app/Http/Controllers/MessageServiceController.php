<?php

namespace App\Http\Controllers;

use App\Models\MessageService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $messageServices = MessageService::all();

        return response()->json($messageServices);
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
        $messageService = new MessageService;

        $messageService->id = $request->id;
        $messageService->name = $request->name;
        $messageService->id_service = $request->id_service;
        $messageService->name_service = $request->name_service;
        $messageService->email = $request->email;
        $messageService->phone = $request->phone;
        $messageService->reason = $request->reason;
        $messageService->details = $request->details;
        $messageService->save();

        $data = [
            "message" => "Mensaje enviado con exito",
            "messageService" => $messageService
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(MessageService $messageService)
    {
        //
        return response()->json($messageService);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MessageService $messageService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MessageService $messageService)
    {
        //        
        $messageService->status = $request->status;
        $messageService->save();

        $data = [
            "message" => "Mensaje dado de baja con exito",
            "messageService" => $messageService
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MessageService $messageService)
    {
        //
        $messageService->delete();

        $data = [
            "message" => "Mensaje eliminado con exito",
            "messageService" => $messageService
        ];

        return response()->json($data);
    }
}
