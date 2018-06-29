<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    public function index()
    {
        return Curso::all();
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required|min:4|string'
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            return ControllerUtils::successResponseJson(Curso::create($request->all()), "Curso registrado correctamente.");

        } else {
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function show($id)
    {
        return Curso::find($id);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nombre' => 'required|min:4|string'
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $curso = Curso::findOrFail($id);
            $curso->update($request->all());
            return ControllerUtils::successResponseJson($curso, "Curso actualizado correctamente.");

        } else {
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function destroy($id)
    {
        try {
            $curso = Curso::find($id);

            if ($curso) {
                $curso->delete();
                return ControllerUtils::successResponseJson(null, "Curso eliminado correctamente.");
            } else {
                return ControllerUtils::errorResponseJson('El Curso a eliminar no éxiste.');
            }


        } catch (\Exception $e) {
            return ControllerUtils::errorResponseJson('Error al eliminar el curso.');
        }

    }
}
