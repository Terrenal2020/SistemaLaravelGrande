<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Usuarios;
use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegistro(){
        return view('registroEmpleados');
    }
    public function index()
    {
        $empleados=Empleados::paginate(3);
        //$almacenes=Almacenes::where ('nombre','like'.'%'.$buscador.'%')
        //->orWhere('direccion','like'.'%'.$buscador.'%')
        //->latest('id')->paginate(2);
        //$data=['']
        return view('listadoUsuarios')->with('empleados',$empleados);;
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
        //crear contraseñas aletorias
        $password = Str::random(8);



        $usuarios=new  Usuarios();
        $usuarios->nombreUsuario=$request->get('nombre');
        $usuarios->contrasena=$password;
        $usuarios->fechaActualizacion=Carbon::now();


        $usuarios->save();

        $idUsua=$usuarios->id;
        $empleados=new  Empleados();
        $empleados->nombre=$request->get('nombre');
        $empleados->apellidoPaterno=$request->get('apellidoPaterno');
        $empleados->apellidoMaterno=$request->get('apellidoMaterno');
        $empleados->sexo=$request->get('sexo');
        $empleados->cargo=$request->get('cargo');
        $empleados->direccion=$request->get('direccion');
        $empleados->telefono=$request->get('telefono');
        $empleados->usuario_id=$idUsua;
        $empleados->fecha=Carbon::now();
        $empleados->save();

        $name=gethostname();
        $bitacora=new Bitacora();
        $bitacora->hostName=$name;
        $bitacora->direccionIp=gethostbyname($name);
        $bitacora->tipoMovimiento="Insercion";
        $bitacora->descripcion="agregar nuevo empleado";
        $bitacora->fechaActualizacion=Carbon::now();
        $bitacora->idUsuario=$idUsua;
        $bitacora->save();
        return view( 'welcome' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleados $empleados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleados=Empleados::findOrFail($id);
        $empleados->delete();
        //return redirect('productos');
        alert()->error('Mensaje','Usuario Eliminado');

         return back();
    }
}
