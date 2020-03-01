<?php

namespace App\Http\Controllers;

use App\Estacion;
use App\Transporte;
use App\Gestion;
use App\Car;
use App\Solicitud;
use App\Success;
use Illuminate\Http\Request;


class GestionController extends Controller
{
    public function __Construct()
    {
        $this->middleware('permission:gestiones.index')->only('index');
        $this->middleware('permission:gestiones.store')->only(['create', 'store']);
        $this->middleware('permission:gestiones.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestiones = Gestion::All();

        return view('gestiones', compact('gestiones'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estaciones = Estacion::orderby('nombre','ASC')->get();
        $transportes = Transporte::orderby('placa','ASC')->get();
        $gestiones= Gestion::All();


        return view('gestiones_new', compact('estaciones','transportes','gestiones'));  
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
            'transporte' => 'required',
            'estacion' => 'required',
            'fecha' => 'required',
            'litros' => 'required',
        ]);

        $gestion = new Gestion;

            $gestion->rif_estacion = $request->input('estacion');
            $gestion->placa_transporte = $request->input('transporte');
            $gestion->fecha_despacho = $request->input('fecha');
            $gestion->litros = $request->input('litros');
            $gestion->inicial = $request->input('litros');
            $gestion->save();

        return redirect('/gestiones')->with('success','El despacho Fue Generado Correctamente'); 
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
        $gestion = Gestion::where('id', '=' ,$id);
        $gestion->delete();
        return back()->with('info','El despacho Fue Eliminado');
    }
    

    public function notificar($id)
    {  

        $gestion = Gestion::where('id', '=' ,$id);
        $litros = $gestion->pluck('litros')->first();

        $solicitudes = Solicitud::where('rif_estacion','=',$gestion->pluck('rif_estacion'))->where('id_status','1')->get();
        $capacidades = $solicitudes->pluck('capacidad_car');
        $sum = 0;
        $cant = 0;
        foreach ($capacidades as $capacidad) {
            if($litros > $sum+$capacidad){
                $sum += $capacidad;
                $cant = $cant+1;

                $success = new Success;
                $success->codigo_solicitud = $solicitudes->pluck('codigo')[$cant-1];
                $success->rif_estacion = $solicitudes->pluck('rif_estacion')[$cant-1];
                $success->placa_car = $solicitudes->pluck('placa_car')[$cant-1];
                $success->usuario_id = $solicitudes->pluck('usuario_id')[$cant-1];
                $success->capacidad_car = $solicitudes->pluck('capacidad_car')[$cant-1];
                $success->placa_transporte = $gestion->pluck('placa_transporte')->first();
                $success->id_gestion = $gestion->pluck('id')->first();
                $success->fecha_gestion = $gestion->pluck('fecha_despacho')->first();
                $success->save();

                $solicitud = Solicitud::where('codigo',$solicitudes->pluck('codigo')[$cant-1]);
                $solicitud->update(['id_status' => '2',
                                    'aprobacion' => $gestion->pluck('fecha_despacho')->first()
                                    ]);
                
            }
        }

        $litros = $litros- $sum;
        $gestion->update(['litros' => $litros ]);    


        return back()->with('info','La asignacion se ha realizado exitosamente');
    }


}
