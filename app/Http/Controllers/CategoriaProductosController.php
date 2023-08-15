<?php

namespace App\Http\Controllers;

use App\Models\categoriaProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriaProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getRegistro(){
        return view('registroCategorias');
    }

    public function editarCategoria($id){
        $categoriaProductos = categoriaProductos::findOrFail($id);

        return view('editarCategoria')->with('categoriaProductos',$categoriaProductos);
    }

    public function index()
    {
        $categoriaProductos=categoriaProductos::paginate(7);
       
        return view('listadoCategoriaProductos')->with('categoriaProductos',$categoriaProductos);;
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

        $file = $request->foto;
        $name = time() . $file->getClientOriginalName();
        $file->move(public_path() . '\storage\uploads\/', $name);

        $categoria=new  categoriaProductos();
        $categoria->codigo=$request->get('codigo');
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->ruta = $name;

       
       

        $categoria->save();
        alert()->alert('Mensaje','Categoria de producto Guardado');
        return redirect()->route('refrescar');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoriaProductos  $categoriaProductos
     * @return \Illuminate\Http\Response
     */
    public function show(categoriaProductos $categoriaProductos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoriaProductos  $categoriaProductos
     * @return \Illuminate\Http\Response
     */
    public function edit(categoriaProductos $categoriaProductos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoriaProductos  $categoriaProductos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = categoriaProductos::findOrFail($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads'), $name);
            $categoria->ruta = $name;
        }
    
        $categoria->codigo = $request->codigo;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
    
        $categoria->save();
        alert()->alert('Mensaje','Categoria de Producto Modificado');

        return redirect()->route('refrescar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoriaProductos  $categoriaProductos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=categoriaProductos::findOrFail($id);
        $categoria->delete();
        //return redirect('productos');
        alert()->error('Mensaje','Categoria Eliminado');

            return back();
    }

    public function busquedaCategorias(Request $request){
        $nombre = $request->nombre; 
        $registroDe = DB::select('SELECT categoria_Productos.id, codigo, nombre, descripcion, ruta
        FROM categoria_Productos
        WHERE categoria_Productos.nombre = :nombre OR categoria_Productos.codigo = :codigo', [
            'nombre' => $nombre,
            'codigo' => $nombre
        ]);
        $categoriaProductos = DB::table('categoria_Productos') ->select('id','codigo','nombre','descripcion','ruta')->get();
       
        $categoriaProductos=categoriaProductos::all();
    
        if(sizeof($registroDe)>0){
            alert()->info('Mensaje', 'Departamento Encontrado');
            //return view('busquedaAlmacenes')->with('almacenes',$almacenes);
           return view( 'busquedaCategoriaProductos', compact( 'registroDe'));
            }else{
                alert()->warning('Mensaje', 'Departamento No encontrado');      
                return back();

                    }
        }

        //refrescar
        public function refrescar()
    {
        $categoriaProductos=categoriaProductos::paginate(7);
       
        return view('listadoCategoriaProductos')->with('categoriaProductos',$categoriaProductos);;
    }

}
