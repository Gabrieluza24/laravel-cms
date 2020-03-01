<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\Car;
use App\Estacion;
use App\Success;
use Illuminate\Support\Facades\Auth;


class SolicitudController extends Controller
{
        public function __Construct()
    {
        $this->middleware('permission:solicitudes.index')->only('index');
        $this->middleware('permission:solicitudes.show')->only('show');
        $this->middleware('permission:solicitudes.store')->only(['create', 'store']);
        $this->middleware('permission:solicitudes.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;
        $solicitudes = Solicitud::where('usuario_id',$usuario)->orderby('codigo','DESC')->get();
        $success = Success::where('usuario_id',$usuario)->get();

        return view('solicitudes', compact('solicitudes','success'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Auth::user()->id;
        $estaciones = Estacion::orderby('nombre','ASC')->get();
        $cars = Car::where('usuario_id',$usuario)->get();
        $solicitudes = Solicitud::where('usuario_id',$usuario)->get();


        return view('solicitudes_new', compact('estaciones','cars','solicitudes'));  
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
            'car' => 'required',
            'estacion' => 'required',
        ]);

        $cars = Car::where('placa',$request->input('car'));
        $solicitudes = Solicitud::where('placa_car',$cars->pluck('placa')->first())->get();
        foreach ($solicitudes as $slt) {
            if ($slt->id_status=='1')
            {
                return back()->with('error','Este auto ya tiene una solicitud activa');
            }
        }
        $solicitud = new Solicitud;

            $solicitud->usuario_id = Auth::user()->id;
            $solicitud->rif_estacion = $request->input('estacion');
            $solicitud->placa_car = $request->input('car');
            $solicitud->capacidad_car = $cars->pluck('capacidad')->first();
            $solicitud->id_status = '1';
            $solicitud->save();

        return redirect('/solicitudes')->with('success','la Solicitud Fue Generada Correctamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitudes = Solicitud::orderby('codigo','DESC')->get();

        return view('solicitudes', compact('solicitudes'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitud = Solicitud::where('codigo', '=' ,$id);
        $solicitud->delete();
        return back()->with('info','La Solicitud Fue Eliminada');
    }
}
