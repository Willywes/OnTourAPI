<?php

namespace App\Http\Controllers;

use App\ServicioAdicional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicioAdicionalController extends Controller
{
    public function index()
    {
        return ServicioAdicional::all();
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required|min:4|string',
            'precio' => 'required',
            'tipo' => 'required',
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            return ControllerUtils::successResponseJson(ServicioAdicional::create($request->all()), "ServicioAdicional registrado correctamente.");

        } else {
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function show($id)
    {
        return ServicioAdicional::find($id);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nombre' => 'required|min:4|string',
            'precio' => 'required',
            'tipo' => 'required'
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $servicio_adicional = ServicioAdicional::findOrFail($id);
            $servicio_adicional->update($request->all());
            return ControllerUtils::successResponseJson($servicio_adicional, "Servicio Adicional actualizado correctamente.");

        } else {
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function destroy($id)
    {
        try {
            $servicio_adicional = ServicioAdicional::find($id);

            if ($servicio_adicional) {
                $servicio_adicional->delete();
                return ControllerUtils::successResponseJson(null, "ServicioAdicional eliminado correctamente.");
            } else {
                return ControllerUtils::errorResponseJson('El Servicio Adicional a eliminar no éxiste.');
            }


        } catch (\Exception $e) {
            return ControllerUtils::errorResponseJson('Error al eliminar el tour.');
        }

    }
}
