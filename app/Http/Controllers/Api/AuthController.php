<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $cle101 = 'cle101-'.rand(1000,9000);

        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required',
            'password' => 'required|confirmed',
            'role' => 'required',
            'phone' => 'required',
        ]);
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['cle101'] = $cle101;
        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'accesss_token' => $accessToken]);
    }

    public function login(Request $request){

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if(!auth()->attempt($loginData)){
            return response(['message' => 'Invalide']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'accesss_token' => $accessToken]);
    }

    public function details(){
        return response()->json(['user' => auth()->user()], 200);
    }
}
