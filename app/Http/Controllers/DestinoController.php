<?php

namespace App\Http\Controllers;

use App\Destino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestinoController extends Controller
{

    public function index()
    {
        return Destino::all();
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required|min:4|string'
        ];

        $messages = [
            'nombre.required' => 'El nombre del destino es obligatorio.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            return ControllerUtils::successResponseJson(Destino::create($request->all()), "Destino creado correctamente.");

        }else{
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function show($id)
    {
        return Destino::find($id);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nombre' => 'required|string|unique:destinos,nombre,'.$request->id,

        ];

        $messages = [
            'nombre.required' => 'El nombre del destino es obligatorio.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $entity = Destino::findOrFail($id);
            $entity->update($request->all());
            return ControllerUtils::successResponseJson($entity, "Destino actualizado correctamente.");

        }else{
            return ControllerUtils::errorResponseValidation($validator);
        }
    }

    public function destroy($id)
    {
        try{
            $entity = Destino::find($id);

            if($entity){
                $entity->delete();
                return ControllerUtils::successResponseJson(null, "Destino eliminado correctamente.");
            }else{
                return ControllerUtils::errorResponseJson('El Destino a eliminar no éxiste.');
            }


        }catch(\Exception $e){
            return ControllerUtils::errorResponseJson('Error al eliminar el destino.');
        }

    }

}
