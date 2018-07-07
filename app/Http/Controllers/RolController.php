<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{

    public function index()
    {
        return Rol::select('id', 'nombre')
            ->orderBy('nombre')
            ->where('id', '!=', 1)->where('id', '!=', 4)->where('id', '!=', 5)->get();
    }

    public function show($id)
    {
        return Rol::select('id', 'nombre')->orderBy('nombre')->find($id);
    }


    public function store(Request $request){
        return Rol::create($request->all());
    }

}
