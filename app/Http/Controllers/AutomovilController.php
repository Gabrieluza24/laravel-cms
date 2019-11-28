<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automovil;

class AutomovilController extends Controller
{

	public function index (){

		$automoviles = Automovil::all();	
		return view('automovil',compact('automoviles'));
	}
    
    public function store (Request $request){

    	$this->validate($request,[ 
            'placa' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'anno' => 'required',
            'capacidad' => 'required',
        ]);

        $automovil = new Automovil;

        	$automovil->placa = $request->input('placa');
        	$automovil->marca = $request->input('marca');
        	$automovil->modelo = $request->input('modelo');
			$automovil->anno = $request->input('anno');
			$automovil->capacidad = $request->input('capacidad');
			$automovil->save();
			return 'todobien';
	}
}
