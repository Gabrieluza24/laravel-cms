<?php

namespace App\Http\Controllers;

use App\User;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Concerns\HasRole;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;


class UserController extends Controller
{
    public function __Construct()
    {
        $this->middleware('permission:users.index')->only('index');
        $this->middleware('permission:users.edit')->only('edit');
        $this->middleware('permission:users.update')->only('update');
        $this->middleware('permission:users.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personas = Persona::All();
        $users = User::All();
        $roles = Role::get();

        return view('users', compact('personas','users','roles'));
        
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
        //
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
    public function edit(Request $request, $id)
    {
            $persona = Persona::where('cedula', $request->key);
            $usuario = User::where('id', $persona->pluck('usuario_id')->first());

        $rules = [
            'name'      => 'bail|required|max:50',
            'lastname'  => 'bail|required|max:50',
            'tipocedula'=> 'bail|required|max:1|in:V,E',
            'cedula'    => 'bail|required|digits_between:6,8',
            'telefono'  => 'bail|required|digits_between:10,14',
            'email'     => 'bail|required|email',
            'role'      => 'bail|required|in:administrador,usuario',
        ];

        $messages = [
            'name.max' => 'El campo nombre no debe poseer mas de :max caracteres',
            'lastname.max' => 'El campo apellido no debe poseer mas de :max caracteres',

        ];

        $this->validate($request,$rules,$messages);
            
        
            $usuario->update([
             'name'=> $request->name,
             'lastname'=> $request->lastname,
             'email' => $request->email,
            ]);
            
        try
        {
            $persona->update([
            'name'=> $request->name,
            'lastname'=> $request->lastname,
            'telefono' => $request->telefono,
            'cedula' => $request->cedula,
            'tipocedula' => $request->tipocedula,
            ]);
        }
         catch(QueryException $e){

                return redirect()->back()->withErrors('El numero de cedula ya ha sido registrada en el sistema');
            }    

        $roles = $usuario->get()->first()->roles->pluck('slug')->first();
        if($roles)
        {
            $usuario->get()->first()->removeRoles($roles);
        }
        $usuario->get()->first()->assignRoles($request->get('role'));

        return redirect('/user')->with('success','Los datos fueron modificados'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $rules = [
            'current_password' => 'bail|required|password',
            'new_password' => 'bail|required|min:8',
            'password_confirmed' => 'bail|required|same:new_password',
        ];
 
        $messages = [
            'current_password.password' => 'La contraseña es incorrecta',
            'current_password.required' => 'Debe ingresar la contraseña actual',
            'new_password.required' => 'La  nueva contraseña no debe estar vacia',
            'new_password.min' => 'La  nueva contraseña debe contener al menos :min caracteres',
            'password_confirmed.required' => 'Debe repetir la contraseña',
            'password_confirmed.same' => 'Las contraseñas deben ser iguales',
        ];

        $this->validate($request,$rules,$messages);

        $usuario = User::find($user);
        if(hash::check($request->current_password, $usuario->password)){
            if ($request->new_password == $request->password_confirmed){
                $usuario->password = bcrypt($request->input('new_password'));
                $usuario->save();            
            }

            return back()->with('success','La contraseña fue cambiada exitosamente');
        }
       
       else{

            return back()->withErrors('Ha ocurrido un error al tratar de cambiar la contraseña');

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::where('usuario_id',$id); 
        $persona->delete();

        $usuario = User::find($id);
        $usuario->delete();

        return back()->with('info','El usuario Fue Eliminado');
    }

}
