<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;
        $personas = Persona::where('usuario_id',$usuario)->get();
        return view('personas')->with('personas',$personas);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('personas');
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
            'name' => 'required',
            'lastname'  => 'required',
            'tipocedula' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'estado' => 'required',

            ]);

            $usuario = Auth::user();
        
            $usuario->name = $request->name;
            $usuario->lastname = $request->lastname;
            $usuario->save();
        
        $persona = new Persona;

            $persona->usuario_id = Auth::user()->id;
            $persona->tipocedula = $request->input('tipocedula');
            $persona->cedula = $request->input('cedula');
            $persona->name = $request->input('name');
            $persona->lastname = $request->input('lastname');
            $persona->telefono = $request->input('telefono');
            $persona->estado = $request->input('estado');
            $persona->save();

             return redirect('/personas')->with('success','Los datos Fueron Agregados'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        $persona = Persona::where('cedula','like','%'.$persona->cedula.'%'); 
        return view('personas', compact('personas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            $this->validate($request,[ 
            'name' => 'required',
            'lastname'  => 'required',
            'telefono' => 'required',
            'estado' => 'required',

            ]);

            $usuario = Auth::user();
        
            $usuario->update([
             'name'=> $request->name,
             'lastname'=> $request->lastname,
            ]);
            
        $persona = Persona::where('usuario_id', $usuario->id);

            $persona->update([
             'name'=> $request->name,
             'lastname'=> $request->lastname,
            'telefono' => $request->telefono,
             'estado' => $request->estado,
            ]);

        return redirect('/personas')->with('success','Los datos Fueron Agregados'); 
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
