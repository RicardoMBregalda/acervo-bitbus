<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {}

    public function login()
    {
        return response()->json(['data' => 'logado']);
    }

}