<?php

namespace App\Http\Controllers;

use App\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContratoController extends Controller
{
    public function index()
    {
        return Contrato::with(['curso','tour','representante'])->get();
    }

    public function store(Request $request)
    {

        $rules = [
            'fecha' => 'required',
            'nombre_colegio' => 'required',
            'subtotal' => 'required',
            'total' => 'required',
            'representante_id' => 'required',
            'tour_id' => 'required',
            'curso_id' => 'required'
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            return ControllerUtils::successResponseJson(Contrato::create($request->all()), "Contrato registrado correctamente.");

        } else {
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function show($id)
    {
        return Contrato::find($id);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'fecha' => 'required',
            'nombre_colegio' => 'required',
            'subtotal' => 'required',
            'total' => 'required',
            'representante_id' => 'required',
            'tour_id' => 'required',
            'curso_id' => 'required'
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $contrato = Contrato::findOrFail($id);
            $contrato->update($request->all());
            return ControllerUtils::successResponseJson($contrato, "Contrato actualizado correctamente.");

        } else {
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function destroy($id)
    {
        try {
            $contrato = Contrato::find($id);

            if ($contrato) {
                $contrato->delete();
                return ControllerUtils::successResponseJson(null, "Contrato eliminado correctamente.");
            } else {
                return ControllerUtils::errorResponseJson('El Contrato a eliminar no éxiste.');
            }


        } catch (\Exception $e) {
            return ControllerUtils::errorResponseJson('Error al eliminar el contrato.');
        }

    }
}
