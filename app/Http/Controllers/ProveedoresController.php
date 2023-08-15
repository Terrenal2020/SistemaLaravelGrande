<?php

namespace App\Http\Controllers;

use App\Models\proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegistro(){
        return view('registroProveedores');
    }
    public function index()
    {
        //
        $proveedores=proveedores::paginate(4);
       
        return view('listadoProveedores')->with('proveedores',$proveedores);;
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
        $proveedores=new  proveedores();
        $proveedores->nombre=$request->get('nombre');
        $proveedores->direccion=$request->get('direccion');
        $proveedores->telefono=$request->get('telefono');
        $proveedores->estado=$request->get('estado');
        $proveedores->correo=$request->get('correo');
        $proveedores->categoria=$request->get('categoria');
        $proveedores->save();
        alert()->alert('Mensaje','Proveedor Guardado');
        return redirect()->route('refrescarProveedores');
    }

    public function editarProveedores($id)
    {
        $proveedores = proveedores::findOrFail($id);

        return view('editarProveedores')->with('proveedores',$proveedores);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id)
    {
        $proveedores=proveedores::findOrFail($id);
        $proveedores->nombre=$request->nombre;
        $proveedores->direccion=$request->direccion;
        $proveedores->telefono=$request->telefono;
        $proveedores->estado=$request->estado;
        $proveedores->correo=$request->correo;
        $proveedores->categoria=$request->categoria;
   
        $proveedores->save();
        alert()->alert('Mensaje','Proveedor Modificado');

        return redirect()->route('refrescarProveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $proveedores=proveedores::findOrFail($id);
        $proveedores->delete();
        //return redirect('productos');
        alert()->error('Mensaje','Proveedor Eliminado');

            return back();
    }
    public function busquedaProveedores(Request $request){
        $nombre = $request->nombre; 
        $registroDe = DB::select('select proveedores.id,nombre,direccion,estado,telefono,correo,categoria from 
    proveedores where proveedores.nombre=? ', [
            $nombre
            ]
        ); 
        $proveedores = DB::table('proveedores') ->select('id','nombre','direccion','estado','telefono','correo','categoria')->get();
       
        $proveedores=proveedores::all();
    
        if(sizeof($registroDe)>0){
            alert()->info('Mensaje', 'Proveedor Encontrado');
            //return view('busquedaAlmacenes')->with('almacenes',$almacenes);
           return view( 'busquedaProveedores', compact( 'registroDe'));
            }else{
                alert()->warning('Mensaje', 'Proveedor No encontrado');                   
                return back();
          
            }
        }
        public function refrescarProveedores(){
            $proveedores=proveedores::paginate(4);
       
            return view('listadoProveedores')->with('proveedores',$proveedores);;
        }

}
