<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

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
}
