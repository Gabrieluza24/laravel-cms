<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class PersonasController extends Controller
{
    public function __Construct()
    {
        $this->middleware('permission:personas.edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;
        $personas = Persona::where('usuario_id',$usuario)->get();
        return view('personas', compact('personas'));   
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

        $rules = [
            'name'      => 'bail|required|regex:/[a-zA-Z]*/i|max:50',
            'lastname'  => 'bail|required|regex:/[a-zA-Z]*/i|max:50',
            'tipocedula'=> 'bail|required|max:1|in:V,E',
            'cedula'    => 'bail|required|digits_between:6,8|unique:personas,cedula',
            'telefono'  => 'bail|required|digits_between:10,14',
            'estado'    => 'bail|required|in:Merida',
        ];

        $messages = [
            'name.max' => 'El campo nombre no debe poseer mas de :max caracteres',
            'lastname.max' => 'El campo apellido no debe poseer mas de :max caracteres',
            'estado.in' => 'No se reconoce el estado'
        ];

        $this->validate($request,$rules,$messages);

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

        auth()->user()->assignRoles('usuario');

        return redirect('/personas')->with('success','Registro completado con exito'); 
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

            $this->validate($request,
            [ 
                'name'      => 'bail|required|alpha|max:50',
                'lastname'  => 'bail|required|alpha|max:50',
                'telefono'  => 'bail|required|digits_between:10,14',
                'estado'    => 'bail|required|in:Merida',
            ],
            [

                'name.max' => 'El campo nombre no debe poseer mas de :max caracteres',
                'name.alpha' => 'El campo nombre solo puede contener letras',
                'lastname.alpha' => 'El campo apellido solo puede contener letras',
                'lastname.max' => 'El campo apellido no debe poseer mas de :max caracteres',
                'estado.in' => 'No se reconoce el estado'
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

        return redirect('/personas')->with('success','Los datos fueron actualizados con exito'); 
    

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
