<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        return User::with('rol')->get();
    }

    public function store(Request $request)
    {

        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|string',
            'nombres' => 'required',
            'paterno' => 'required',
            'rol_id' => 'required'
        ];

        $messages = [
            'rol_id.required' => 'Debes seleccionar un rol para el usuario.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            return ControllerUtils::successResponseJson(User::create($request->all()), "Usuario creado correctamente.");

        }else{
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function show($id)
    {
        return $user = User::find($id);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'email' => 'required|email|unique:users,email,'.$request->id,
            'nombres' => 'required',
            'paterno' => 'required',
            'rol_id' => 'required',
        ];

        $messages = [
            'rol_id.required' => 'Debes seleccionar un rol para el usuario.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $user = User::findOrFail($id);
            $user->update($request->all());
            return ControllerUtils::successResponseJson($user, "Usuario actualizado correctamente.");

        }else{
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function destroy($id)
    {
        try{
            $user = User::find($id);

            if($user){
                $user->delete();
                return ControllerUtils::successResponseJson(null, "Usuario eliminado correctamente.");
            }else{
                return ControllerUtils::errorResponseJson('El Usuario a eliminar no éxiste.');
            }


        }catch(\Exception $e){
            return ControllerUtils::errorResponseJson('Error al eliminar al usuario.');
        }

    }

}
