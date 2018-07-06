<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function login(Request $request){

		try{
			
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
			{
				$user = User::where('email','=', $request->email)->first();
				Auth::logout();
		        return ControllerUtils::successResponseJson($user, "Login Correcto");
			}
			else
			{
				return ControllerUtils::errorResponseJson('Credenciales de acceso incorrectas');
			}
		} catch(\Exception $ex) {
            return ControllerUtils::errorResponseJson('Error al iniciar sesión');
        }
	}
}
