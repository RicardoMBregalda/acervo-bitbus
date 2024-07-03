<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {}

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $login = Usuario::where('username', $credentials['username'])->where('password', $credentials['password'])->first();
        if ($login) {
            return response()->json(['data' => 'Login realizado com sucesso']);
        }
        return response()->json(['data' => 'Login inválido, verifique seus dados']);
    }

}