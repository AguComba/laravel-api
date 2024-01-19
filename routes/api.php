<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Para ver el listado de rutas habilitadas usar en terminal -> php artisan route:list
Route::post("/login", [LoginController::class, "login"]);

Route::apiResources([
    'pruebas' => PruebaController::class,
    'customer' => CustomerController::class
]);
//Rutas que requieren autorizacion 
Route::middleware('auth:sanctum')->group(function() {
});
