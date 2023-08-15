<?php

namespace App\Http\Controllers;

use App\Models\Almacenes;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class AlmacenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegistro(){
        return view('registroAlmacenes');
    }
    public function index(Request $request)
    {
        //
       // $buscador=$request->get('busqueda');
        //$almacenes=Almacenes::all();
        $almacenes=Almacenes::paginate(3);
        //$almacenes=Almacenes::where ('nombre','like'.'%'.$buscador.'%')
        //->orWhere('direccion','like'.'%'.$buscador.'%')
        //->latest('id')->paginate(2);
        //$data=['']
        return view('listadoAlmacenes')->with('almacenes',$almacenes);;
      //return view('listadoAlmacenes',compact('almacenes'));
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
        $almacenes=new  Almacenes();
        $almacenes->nombre=$request->get('nombre');
        $almacenes->direccion=$request->get('direccion');
        $almacenes->telefono=$request->get('telefono');
        $almacenes->codigopostal=$request->get('codigo');
        $almacenes->save();
        alert()->alert('Mensaje','Almacen Guardado');
        return redirect()->route('refrescarAlmacen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function show(Almacenes $almacenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $almacenes = Almacenes::findOrFail($id);

        return view('editarAlmacenes')->with('almacenes',$almacenes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $almacenes=Almacenes::findOrFail($id);
        $almacenes->nombre=$request->nombre;
        $almacenes->direccion=$request->direccion;
        $almacenes->telefono=$request->telefono;
        $almacenes->codigopostal=$request->codigopostal;


   
        $almacenes->save();
        alert()->alert('Mensaje','Almacen Modificado');

        return redirect()->route('refrescarAlmacen');
       
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $almacenes=Almacenes::findOrFail($id);
        $almacenes->delete();
        //return redirect('productos');
        alert()->error('Mensaje','Almacen Eliminado');

         return back();
    }


    //mostrar menu nuevamente
    public function getMostrar(){
        return view('menuprincipal');
    }

    //busqueda
   //metodo para buscar mediante el folio
   public function busquedaAlmacenes(Request $request){
    $nombre = $request->nombre; 
    $registroDe = DB::select('select almacenes.id,nombre,direccion,telefono,codigoPostal from 
    almacenes where almacenes.nombre=? ', [
        $nombre
        ]
    ); 
    $almacenes = DB::table('almacenes') ->select('id','nombre','direccion','telefono','codigoPostal')->get();
   
    $almacenes=Almacenes::all();

    if(sizeof($registroDe)>0){
        alert()->info('Mensaje', 'Almacen Encontrado');
        //return view('busquedaAlmacenes')->with('almacenes',$almacenes);
       return view( 'busquedaAlmacenes', compact( 'registroDe'));
        }else{
            alert()->warning('Mensaje', 'Almacen No encontrado');                   
            
            return back();
      
        }
    }
         //refrescar
         public function refrescarAlmacen()
         {
            $almacenes=Almacenes::paginate(3);
        return view('listadoAlmacenes')->with('almacenes',$almacenes);;
         }


}
