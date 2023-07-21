<?php

namespace App\Http\Controllers;

use App\Models\MessageContact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $messageContacts = MessageContact::all();

        return response()->json($messageContacts);
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
        $messageContact = new MessageContact;

        $messageContact->id = $request->id;
        $messageContact->name = $request->name;       
        $messageContact->email = $request->email;
        $messageContact->phone = $request->phone;
        $messageContact->reason = $request->reason;
        $messageContact->details = $request->details;
        $messageContact->save();

        $data = [
            "message" => "Mensaje enviado con exito",
            "messageService" => $messageContact
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(MessageContact $messageContact)
    {
        //
        return response()->json($messageContact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MessageContact $messageContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MessageContact $messageContact)
    {
        //
        $messageContact->status = $request->status;
        $messageContact->save();

        $data = [
            "message" => "Mensaje dado de alta con exito",
            "messageService" => $messageContact
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MessageContact $messageContact)
    {
        //
        $messageContact->delete();

        $data = [
            "message" => "Mensaje eliminado con exito",
            "messageService" => $messageContact
        ];

        return response()->json($data);
    }
}
