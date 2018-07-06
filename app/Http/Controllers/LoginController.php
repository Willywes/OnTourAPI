<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function login(Request $request){

		$user = User::where('email','LIKE', $request->email)->where('password','LIKE', bcrypt($request->password))->first();

		if ($user) {
            return ControllerUtils::successResponseJson($user, "Login Correcto");

        } else {
            return ControllerUtils::errorResponseJson('Error al iniciar sesión');
        }
	}
}
