<?php

namespace App\Http\Controllers;

use App\Estacion;
use Illuminate\Http\Request;

class EstacionesController extends Controller
{
        public function __Construct()
    {
        $this->middleware('permission:estacionservicio.index')->only('index');
        $this->middleware('permission:estacionservicio.edit')->only(['edit', 'update']);
        $this->middleware('permission:estacionservicio.store')->only(['create', 'store']);
        $this->middleware('permission:estacionservicio.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estaciones = Estacion::all();
        return view('estaciones')->with('estaciones',$estaciones);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'rif' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'surtidores' => 'required',
            'capacidad' => 'required',
        ]);

        $estacion = new Estacion;

            $estacion->rif = $request->input('rif');    
            $estacion->nombre = $request->input('nombre');
            $estacion->direccion = $request->input('direccion');
            $estacion->surtidores = $request->input('surtidores');
            $estacion->capacidad = $request->input('capacidad');
            $estacion->save();

        return redirect('/estaciones')->with('success','La estacion de servicio Fue Agregada'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estaciones  $estaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Estaciones $estaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estaciones  $estaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Estaciones $estaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estaciones  $estaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estaciones $estaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estaciones  $estaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estaciones $estaciones)
    {
        //
    }
}
