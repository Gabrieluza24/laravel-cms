<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;



class CarsController extends Controller
{

    public function __Construct()
    {
        $this->middleware('permission:cars.index')->only('index');
        $this->middleware('permission:cars.edit')->only(['edit', 'update']);
        $this->middleware('permission:cars.store')->only(['create', 'store']);
        $this->middleware('permission:cars.show')->only('show');
        $this->middleware('permission:cars.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;
        $cars = Car::where('usuario_id',$usuario)->get();      
        return view('cars', compact('cars')); 
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
        $rules = [
            'placa' => 'bail|required|alpha_num|between:6,7|unique:cars',
            'marca' => 'bail|required|alpha',
            'modelo' => 'bail|required',
            'anno' => 'bail|required|digits:4',
            'capacidad' => 'bail|required|numeric|min:1',
        ];

        $messages = [
            'placa.required' => 'Debe ingresar una placa para el automovil',
            'placa.unique' => 'Este vehiculo ya ha sido registrado',
            'capacidad.min' => 'La capadidad debe ser de al menos :min litro',
        ];

        $this->validate($request,$rules,$messages);
 
        $car = new Car;

            $car->usuario_id = Auth::user()->id;
            $car->placa = strtoupper($request->input('placa'));
            $car->marca = strtoupper($request->input('marca'));
            $car->modelo = strtoupper($request->input('modelo'));
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
        $cars = Car::All(); 
        return view('cars')->with('cars',$cars);  
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
         $car = Car::where('placa','like','%'.$request->key.'%');
         $placa = $car->pluck('placa')->first();

         $rules = [
            'placa' => 'bail|required|alpha_num|between:6,7',
            'marca' => 'bail|required|alpha',
            'modelo' => 'bail|required',
            'anno' => 'bail|required|digits:4',
            'capacidad' => 'bail|required|numeric|min:1',
        ];

        $messages = [
            'placa.required' => 'Debe ingresar una placa para el automovil',
            'placa.unique' => 'Este vehiculo ya ha sido registrado',
            'capacidad.min' => 'La capadidad debe ser de al menos :min litro',
        ];

        $this->validate($request,$rules,$messages);

        try{
            $car->update([
                'placa'=> strtoupper($request->placa),
                'marca'=> strtoupper($request->marca),
                'modelo'=> strtoupper($request->modelo),
                'anno'=> $request->anno,
                'capacidad'=> $request->capacidad,
            ]);

            return redirect('/cars')->with('success','El Automovil Fue modificado');  
        }

        catch(QueryException $e){

                return redirect()->back()->withErrors('Esta numero de placa ya ha sido registrada en el sistema');
            }    
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
        return back()->with('success','El Automovil Fue Eliminado');
    }
}
