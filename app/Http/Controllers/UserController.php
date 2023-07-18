<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();

        $array = [];
        foreach ($users as $user) {
            $array[] = [
                "id" => $user->id,
                "role" => $user->role,
                "worker" => $user->worker,
                "email" => $user->email,
                "birthdate" => $user->birthdate,
                "question1" => $user->question1,
                "answer1" => $user->answer1,
                "question2" => $user->question2,
                "answer2" => $user->answer2,
                "status" => $user->status,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at
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
        $user = new User;
        $user->id_role = $request->id_role;
        $user->id_worker = $request->id_worker;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->birthdate = $request->birthdate;
        $user->password = $request->password;
        $user->question1 = $request->question1;
        $user->answer1 = $request->answer1;
        $user->question2 = $request->question2;
        $user->answer2 = $request->answer2;
        $user->save();

        $data =[
            "message" => "Usuario creado con exito",
            "user" => $user
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $data = [
            "message" => "Usuario details",
            "user" => [
                "id" => $user->id,
                "role" => $user->role,
                "worker" => $user->worker,
                "email" => $user->email,
                "birthdate" => $user->birthdate,
                "question1" => $user->question1,
                "answer1" => $user->answer1,
                "question2" => $user->question2,
                "answer2" => $user->answer2,
                "status" => $user->status,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at
            ]
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->id_role = $request->id_role;
        $user->id_worker = $request->id_worker;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->birthdate = $request->birthdate;
        $user->password = $request->password;
        $user->question1 = $request->question1;
        $user->answer1 = $request->answer1;
        $user->question2 = $request->question2;
        $user->answer2 = $request->answer2;
        $user->status = $request->status;
        $user->save();

        $data = [
            "message" => "Usuario actualizado con exito",
            "user" => $user
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        $data = [
            "message" => "Usuario eliminaro con exito",
            "user" => $user
        ];

        return response()->json($data);
    }
}
