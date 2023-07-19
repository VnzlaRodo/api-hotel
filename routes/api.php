<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeServiceController;
use App\Http\Controllers\LodgingController;
use App\Http\Controllers\HabitationController;
use App\Http\Controllers\TypeHabitationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TypeEventController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TypeExtraController;
use App\Http\Controllers\ServiceExtraController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\api\AuthController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//endpoint publicos
Route::get('typehabitations-public', [TypeHabitationController::class, 'index']);
Route::get('typeservices-public', [TypeServiceController::class, 'index']);
Route::get('events-public', [EventController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::get('user-profile', [AuthController::class, 'userProfile']);
    Route::post('logout', [AuthController::class, 'logout']);

    //Usuarios
    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
    
    
    //Clientes
    Route::get('clients', [ClientController::class, 'index']);
    Route::post('clients', [ClientController::class, 'store']);
    Route::get('clients/{client}', [ClientController::class, 'show']);
    Route::put('clients/{client}', [ClientController::class, 'update']);
    Route::delete('clients/{client}', [ClientController::class, 'destroy']);
    
    //Servicios de clientes
    Route::get('services', [ServiceController::class, 'index']);
    Route::post('services', [ServiceController::class, 'store']);
    Route::get('services/{service}', [ServiceController::class, 'show']);
    Route::put('services/{service}', [ServiceController::class, 'update']);
    Route::delete('services/{service}', [ServiceController::class, 'destroy']);
    
    //Agregar y quitar servicios a clientes
    Route::post('clients/service', [ClientController::class, 'attach']);
    Route::post('clients/service/detach', [ClientController::class, 'detach']);
    
    //Servicio con clientes - Pivote
    Route::post('services/clients', [ServiceController::class, 'clients']);
    
    //Tipo de servicios generales
    Route::get('typeservices', [TypeServiceController::class, 'index']);
    Route::post('typeservices', [TypeServiceController::class, 'store']);
    Route::get('typeservices/{typeService}', [TypeServiceController::class, 'show']);
    Route::put('typeservices/{typeService}', [TypeServiceController::class, 'update']);
    Route::delete('typeservices/{typeService}', [TypeServiceController::class, 'destroy']);
    
    //Hospedaje
    Route::get('lodgings', [LodgingController::class, 'index']);
    Route::post('lodgings', [LodgingController::class, 'store']);
    Route::get('lodgings/{lodging}', [LodgingController::class, 'show']);
    Route::put('lodgings/{lodging}', [LodgingController::class, 'update']);
    Route::delete('lodgings/{lodging}', [LodgingController::class, 'destroy']);
    
    //Tipo de habitación
    Route::get('typehabitations', [TypeHabitationController::class, 'index']);
    Route::post('typehabitations', [TypeHabitationController::class, 'store']);
    Route::get('typehabitations/{typehabitation}', [TypeHabitationController::class, 'show']);
    Route::put('typehabitations/{typehabitation}', [TypeHabitationController::class, 'update']);
    Route::delete('typehabitations/{typehabitation}', [TypeHabitationController::class, 'destroy']);
    
    //Habitaciones
    Route::get('habitations', [HabitationController::class, 'index']);
    Route::post('habitations', [HabitationController::class, 'store']);
    Route::get('habitations/{habitation}', [HabitationController::class, 'show']);
    Route::put('habitations/{habitation}', [HabitationController::class, 'update']);
    Route::delete('habitations/{habitation}', [HabitationController::class, 'destroy']);
    
    //Eventos
    Route::get('events', [EventController::class, 'index']);
    Route::post('events', [EventController::class, 'store']);
    Route::get('events/{event}', [EventController::class, 'show']);
    Route::put('events/{event}', [EventController::class, 'update']);
    Route::delete('events/{event}', [EventController::class, 'destroy']);
    
    //Tipos de eventos
    Route::get('typeevents', [TypeEventController::class, 'index']);
    Route::post('typeevents', [TypeEventController::class, 'store']);
    Route::get('typeevents/{typeevent}', [TypeEventController::class, 'show']);
    Route::put('typeevents/{typeevent}', [TypeEventController::class, 'update']);
    Route::delete('typeevents/{typeevent}', [TypeEventController::class, 'destroy']);
    
    //Espacios
    Route::get('spaces', [SpaceController::class, 'index']);
    Route::post('spaces', [SpaceController::class, 'store']);
    Route::get('spaces/{space}', [SpaceController::class, 'show']);
    Route::put('spaces/{space}', [SpaceController::class, 'update']);
    Route::delete('spaces/{space}', [SpaceController::class, 'destroy']);
    
    //tickets
    Route::get('tickets', [TicketController::class, 'index']);
    Route::post('tickets', [TicketController::class, 'store']);
    Route::get('tickets/{ticket}', [TicketController::class, 'show']);
    Route::put('tickets/{ticket}', [TicketController::class, 'update']);
    Route::delete('tickets/{ticket}', [TicketController::class, 'destroy']);
    
    //Tipo de servicios extra
    Route::get('typeextras', [TypeExtraController::class, 'index']);
    Route::post('typeextras', [TypeExtraController::class, 'store']);
    Route::get('typeextras/{typeextra}', [TypeExtraController::class, 'show']);
    Route::put('typeextras/{typeextra}', [TypeExtraController::class, 'update']);
    Route::delete('typeextras/{typeextra}', [TypeExtraController::class, 'destroy']);
    
    //Servicios extra
    Route::get('service_extras', [ServiceExtraController::class, 'index']);
    Route::post('service_extras', [ServiceExtraController::class, 'store']);
    Route::get('service_extras/{service_extra}', [ServiceExtraController::class, 'show']);
    Route::put('service_extras/{service_extra}', [ServiceExtraController::class, 'update']);
    Route::delete('service_extras/{service_extra}', [ServiceExtraController::class, 'destroy']);
    
    //Roles de usuario
    Route::get('roles', [RoleController::class, 'index']);
    Route::post('roles', [RoleController::class, 'store']);
    Route::get('roles/{role}', [RoleController::class, 'show']);
    Route::put('roles/{role}', [RoleController::class, 'update']);
    Route::delete('roles/{role}', [RoleController::class, 'destroy']);
    
    //Trabajadores
    Route::get('workers', [WorkerController::class, 'index']);
    Route::post('workers', [WorkerController::class, 'store']);
    Route::get('workers/{worker}', [WorkerController::class, 'show']);
    Route::put('workers/{worker}', [WorkerController::class, 'update']);
    Route::delete('workers/{worker}', [WorkerController::class, 'destroy']);
});

