<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tickets = Ticket::all();

        return response()->json($tickets);
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
        $ticket = new Ticket;
        $ticket->event_id = $request->event_id;
        $ticket->name = $request->name;
        $ticket->date = $request->date;
        $ticket->description = $request->description;
        $ticket->save();

        $data = [
            "message" => "Ticket creado con exito",
            "ticket" => $ticket
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
        return response()->json($ticket);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
        $ticket->event_id = $request->event_id;
        $ticket->name = $request->name;
        $ticket->date = $request->date;
        $ticket->description = $request->description;
        $ticket->save();

        $data = [
            "message" => "Ticket actualizado con exito",
            "ticket" => $ticket
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
        $ticket->delete();

        $data = [
            "message" => "Ticket eliminado con exito",
            "ticket" => $ticket
        ];

        return response()->json($data);
    }
}
