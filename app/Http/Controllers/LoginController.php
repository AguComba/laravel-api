<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Auth\Events\Validated;

class LoginController extends Controller
{
    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!Auth::attempt($validated)) {
            return response()->json(['message'=>'Credenciales invalidas'], 401);
        }
        $user = Customer::where("email", $validated["email"])->first();
        return response()->json([
            "token" => $user->createToken('auth_token')->plainTextToken,
            "type"=> 'Bearer'
        ]);
    }

    public function register(Request $request){
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:user_customer,email',
            'password' => 'required|confirmed|min:8'
        ]);
        $validated['password'] = bcrypt($validated["password"]);
        $validated["date_input"] = date("Y-m-d");
        $user = Customer::create($validated);

        return response()->json([
            'data' => $user,
            'token' => $user->createToken("api_token")->plainTextToken,
            'type' => 'Bearer'
        ], 201);
    }
}
