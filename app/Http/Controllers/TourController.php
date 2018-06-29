<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TourController extends Controller
{

    public function index()
    {
        return Tour::with('destino')->get();
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required|min:4|string',
            'precio_base' => 'required',
            'dias' => 'required',
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            return ControllerUtils::successResponseJson(Tour::create($request->all()), "Tour registrado correctamente.");

        } else {
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function show($id)
    {
        return Tour::find($id);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nombre' => 'required|min:4|string',
            'precio_base' => 'required',
            'dias' => 'required'
        ];

        $messages = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $tour = Tour::findOrFail($id);
            $tour->update($request->all());
            return ControllerUtils::successResponseJson($tour, "Tour actualizado correctamente.");

        } else {
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function destroy($id)
    {
        try {
            $tour = Tour::find($id);

            if ($tour) {
                $tour->delete();
                return ControllerUtils::successResponseJson(null, "Tour eliminado correctamente.");
            } else {
                return ControllerUtils::errorResponseJson('El Tour a eliminar no éxiste.');
            }


        } catch (\Exception $e) {
            return ControllerUtils::errorResponseJson('Error al eliminar el tour.');
        }

    }
}
