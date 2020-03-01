<?php

namespace App\Http\Controllers;

use App\Transporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransporteController extends Controller
{
    public function __Construct()
    {
        $this->middleware('permission:transportes.index')->only('index');
        $this->middleware('permission:transportes.edit')->only(['edit', 'update']);
        $this->middleware('permission:transportes.store')->only(['create', 'store']);
        $this->middleware('permission:transportes.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportes = Transporte::all();
        return view('transportes')->with('transportes',$transportes);  
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
            'placa' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'anno' => 'required',
            'chofer' => 'required'
        ]);

        $transporte = new transporte;

            $transporte->placa = $request->input('placa');
            $transporte->marca = $request->input('marca');
            $transporte->modelo = $request->input('modelo');
            $transporte->anno = $request->input('anno');
            $transporte->chofer = $request->input('chofer');
            $transporte->save();


        return redirect('/transportes')->with('success','El Transporte Fue Agregado'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transporte = Transporte::where('placa','like','%'.$placa.'%')->get(); 
        return view('transportes')->with('transportes',$transporte);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            $this->validate($request,[ 
            'placa' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'anno' => 'required',
            'chofer' => 'required',
        ]);

        $transporte = transporte::where('placa','like','%'.$request->key.'%');

        $transporte->update([
             'placa'=> $request->placa,
             'marca'=> $request->marca,
             'modelo'=> $request->modelo,
             'anno'=> $request->anno,
             'chofer'=> $request->chofer,
        ]);
    
    return redirect('/transportes')->with('success','El Camion ha sido modificado');     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($placa)
    {
        $transporte = transporte::where('placa','like','%'.$placa.'%'); 
        $transporte->delete();
        return back()->with('info','El Camion ha sido Eliminado');    }
}
