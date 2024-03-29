<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\TestController;

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
Route::post("/register", [LoginController::class, "register"]);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('customer', CustomerController::class);
//Rutas que requieren autorizacion 
Route::middleware('auth:sanctum')->group(function() {
    Route::apiResources([
        'pruebas' => PruebaController::class,
      //  'customer' => CustomerController::class,
        'test' => TestController::class
    ]);
});
