<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function guardarSPS(Request $request){

        try{
            $contrato = Contrato::create($request->all());
            if($contrato){
                return response()->json([
                    "status" => "success",
                    "message" => "Mensaje enviado correctamente."
                ]);
            }
            return response()->json([
                "status" => "error",
                "message" => "Error en el request."
            ]);
        }catch(\Exception $ex){
            return response()->json([
                "status" => "error",
                "message" => "Error en de exception."
            ]);
        }

    }
}
