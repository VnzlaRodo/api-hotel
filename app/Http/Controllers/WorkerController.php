<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $workers = Worker::all();

        return response()->json($workers);
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
        $worker = new Worker;
        $worker->cedula = $request->cedula;
        $worker->name = $request->name;
        $worker->lastname = $request->lastname;
        $worker->address = $request->address;
        $worker->avatar = $request->avatar;
        $worker->phone = $request->phone;
        $worker->status = "activo";
        $worker->save();

        $data = [
            "message" => "Trabajador creado con exito",
            "worker" => $worker
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(worker $worker)
    {
        //
        return response()->json($worker);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, worker $worker)
    {
        //
        $worker->cedula = $request->cedula;
        $worker->name = $request->name;
        $worker->lastname = $request->lastname;
        $worker->address = $request->address;
        $worker->avatar = $request->avatar;
        $worker->phone = $request->phone;
        $worker->status = $request->status;
        $worker->save();

        $data = [
            "message" => "Trabajador actualizado con exito",
            "worker" => $worker
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(worker $worker)
    {
        //
        $worker->delete();

        $data = [
            "message" => "Trabajador eliminado con exito",
            "worker" => $worker
        ];

        return response()->json($data);
    }
}
