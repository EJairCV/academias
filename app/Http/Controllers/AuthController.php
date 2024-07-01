<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cuenta;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        Auth::logout();
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->rol=='Alumno') {
                return redirect()->route('vista.alumno');
            }else{
                return redirect()->route('usuarios');
            }
            
        } else {
            // Autenticación fallida
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
