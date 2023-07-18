<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            "id_role" => "required",
            "id_worker" => "required",
            "email" => "required|email|unique:users",
            "email_verified_at" => "required|email",
            "birthdate" => "required",
            "password" => "required|confirmed",
            "question1" => "required",
            "answer1" => "required",
            "question2" => "required",
            "answer2" => "required",
        ]);

        $user = new User;
        $user->id_role = $request->id_role;
        $user->id_worker = $request->id_worker;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->password = $request->password;
        $user->question1 = $request->question1;
        $user->answer1 = $request->answer1;
        $user->question2 = $request->question2;
        $user->answer2 = $request->answer2;
        $user->save();

        return response()->json($user, Response::HTTP_CREATED);

    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token', $token, 60 * 24);
            return response(["token" => $token], Response::HTTP_OK)->withoutCookie($cookie);
        } else {
            return response(["message" => "Credenciales invalidas"],Response::HTTP_UNAUTHORIZED);
        }

    }

    public function userProfile(Request $request){
        return response()->json([
            "message" => "Usuario OK",
            "userData" => auth()->user()
        ], Response::HTTP_OK);

    }

    public function logout(){

        $cookie = Cookie::forget('cookie_token');
        return response(["mesage"=>"Cierre de sesión OK"], Response::HTTP_OK)->withCookie($cookie);

    }
}
