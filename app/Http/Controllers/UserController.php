<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with('rol')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|string',
            'role_id' => 'required'
        ];

        $messages = [
            'role_id.required' => 'Debes seleccionar un rol para el usuario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            return ControllerUtils::successResponseJson(User::create($request->all()), "Registro creado correctamente.");

        }else{
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'email' => 'required|email|unique:users,email,'.$request->id,
            'role_id' => 'required',
        ];

        $messages = [
            'role_id.required' => 'Debes seleccionar un rol para el usuario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $user = User::findOrFail($id);
            $user->update($request->all());
            return ControllerUtils::successResponseJson($user, "Registro actualizado correctamente.");

        }else{
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return 204;
    }

}
