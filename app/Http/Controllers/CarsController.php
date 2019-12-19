<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;
        $cars = Car::where('usuario_id',$usuario)->get();
        return view('cars')->with('cars',$cars);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cars');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[ 
            'placa' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'anno' => 'required',
            'capacidad' => 'required'
        ]);

        $car = new Car;

            $car->usuario_id = Auth::user()->id;
            $car->placa = $request->input('placa');
            $car->marca = $request->input('marca');
            $car->modelo = $request->input('modelo');
            $car->anno = $request->input('anno');
            $car->capacidad = $request->input('capacidad');
            $car->save();


        return redirect('/cars')->with('success','El Automovil Fue Agregado'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $placa)
    {
        $car = Car::where('placa','like','%'.$placa.'%'); 
        return view('Car.show', compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($placa)
    {
        $car = Car::where('placa','like','%'.$placa.'%')->get(); 
        return view('cars')->with('cars',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[ 
            'placa' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'anno' => 'required',
            'capacidad' => 'required',
        ]);

        $car = Car::where('placa','like','%'.$request->key.'%');

        $car->update([
             'placa'=> $request->placa,
             'marca'=> $request->marca,
             'modelo'=> $request->modelo,
             'anno'=> $request->anno,
             'capacidad'=> $request->capacidad,
        ]);
    
    return redirect('/cars')->with('success','El Automovil Fue modificado'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($placa)
    {
        $car = Car::where('placa','like','%'.$placa.'%'); 
        $car->delete();
        return back()->with('info','El Automovil Fue Eliminado');
    }
}
