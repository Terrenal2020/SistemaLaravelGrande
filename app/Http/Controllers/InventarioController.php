<?php

namespace App\Http\Controllers;

use App\Models\inventario;
use App\Models\categoriaProductos;
use App\Models\proveedores;
use App\Models\Almacenes;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Response;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegistroInventario(){
        $inventarios=inventario::all();
        $categoriaProductos=categoriaProductos::all();
        $proveedores=proveedores::all();
        $almacen=Almacenes::all();
        return view('registroInventario')->with('categoriaProductos',$categoriaProductos)->with('proveedores',$proveedores)->with('almacenes',$almacen);
    }
   


    public function index()
    {

        $categoriaProductos=categoriaProductos::all();
        $inventario=inventario::paginate(15);
       
        return view('listadoInventario')->with('inventario',$inventario)->with('categoriaProductos',$categoriaProductos);
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
        $impuesto = $request->input('impuesto');

        $importe = $request->input('importe');
        $inventario=new  inventario();
        $inventario->codigo=$request->get('codigo');
        $inventario->nombre=$request->get('nombre');
        $inventario->existencia=$request->get('existencia');
        $inventario->precioUnitario=$request->get('precioUnitario');
        $inventario->departamento=$request->get('departamento');
        $inventario->proveedor=$request->get('proveedor');
        $inventario->almacen=$request->get('almacen');
        if ($impuesto == 'ieps') {
            $inventario->ieps=$importe;
            $inventario->iva=0;
        } elseif ($impuesto == 'iva') {
            $inventario->ieps=0;
            $inventario->iva=$importe;
        }
      
      
      

        $inventario->save();
        alert()->alert('Mensaje','Producto Guardado');
        return redirect()->route('refrescarInventario');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(inventario $inventario)
    {
        //
    }
    public function editarInventario($id)
    {
        $inventario = inventario::findOrFail($id);
        $categoriaProductos = categoriaProductos::all();
        $proveedores = proveedores::all();
        $almacenes = Almacenes::all();
        return view('editarInventario')->with('inventario',$inventario)->with('categoriaProductos',$categoriaProductos)->with('proveedores',$proveedores)->with('almacenes',$almacenes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $impuesto = $request->input('impuesto');

        $importe = $request->input('importe');
        $inventario=inventario::findOrFail($id);
        $inventario->codigo=$request->codigo;
        $inventario->nombre=$request->nombre;
        $inventario->existencia=$request->existencia;
        $inventario->precioUnitario=$request->precioUnitario;
        $inventario->departamento=$request->departamento;
        $inventario->proveedor=$request->proveedor;
        $inventario->almacen=$request->almacen;
        if ($impuesto == 'ieps') {
            $inventario->ieps=$importe;
            $inventario->iva=0;
        } elseif ($impuesto == 'iva') {
            $inventario->ieps=0;
            $inventario->iva=$importe;
        }
        $inventario->save();
        alert()->alert('Mensaje','Producto Modificado');

        return redirect()->route('refrescarInventario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventario=inventario::findOrFail($id);
        $inventario->delete();
        //return redirect('productos');
        alert()->error('Mensaje','Producto Eliminado');

            return back();
    }

    public function busquedaInventario(Request $request)
    {
        $nombre = $request->nombre; 
        
        $registroDe = DB::table('inventarios')
            ->select('id', 'codigo', 'nombre', 'existencia', 'precioUnitario', 'departamento', 'proveedor', 'almacen', 'ieps', 'iva')
            ->where('nombre', 'like', $nombre . '%')
            ->orWhere('codigo', $nombre)
            ->paginate(10); // Especifica el número de elementos por página que deseas mostrar
        
        if ($registroDe->count() > 0) {
            alert()->info('Mensaje', 'Producto Encontrado');
            return view('busquedaInventario', compact('registroDe'));
        } else {
            alert()->warning('Mensaje', 'Departamento No encontrado');
            return back();
        }
    }
    

    public function refrescarInventario()
    {
        $categoriaProductos=categoriaProductos::all();
        $inventario=inventario::paginate(15);
       
        return view('listadoInventario')->with('inventario',$inventario)->with('categoriaProductos',$categoriaProductos);
    }
    



    public function buscarProducto1(Request $request)
    {
        $nombre = $request->input('nombre');

    // Realiza la consulta a la base de datos
    $productos = inventario::where('nombre', 'LIKE', '%' . $nombre . '%')->get();

    // Devuelve los resultados en formato JSON
    return response()->json(['productos' => $productos]);
    }
    
    public function buscarProducto(Request $request){
        $nombre = $request->nombre; 
        $canntidas=$request->pvcantidad;

        $registroDe = DB::table('inventarios')
            ->select('id', 'codigo', 'nombre', 'existencia', 'precioUnitario', 'departamento', 'proveedor', 'almacen', 'ieps', 'iva')
            ->where('nombre', $nombre)
            ->orWhere('codigo', $nombre)
            ->paginate(10); // Especifica el número de elementos por página que deseas mostrar

        if ($registroDe->count() > 0) {
            alert()->info('Mensaje', 'Producto Encontrado');
            foreach ($registroDe as $registro) {
                ventas::create([
                    'codigo' => $registro->codigo,
                    'nombre' => $registro->nombre,
                    'cantidad' =>1,
                    'precioUnitario' => $registro->precioUnitario,
                    'subtotal' => $registro->precioUnitario,
                    // Agrega los demás campos que desees insertar en la otra tabla
                ]);
            }
            $total = DB::table('ventas')->sum('subtotal');

            $inventario = inventario::all();
            $ventas=Ventas::all();
       
            return view('POS')->with('inventario',$inventario)->with('ventas',$ventas)->with('total', $total);;
        } else {
            alert()->warning('Mensaje', 'Producto No encontrado');
            $ventas=Ventas::all();;
            $total = DB::table('ventas')->sum('subtotal');
          //  return view('POS')->with('ventas',$ventas)->with('total', $total);
          //return redirect()->route('refrescarVentas');
          return view('POS')->with('ventas', $ventas)->with('total', $total);

        }
    }

    public function buscarProductos(Request $request)
    {
        $query = $request->input('query');

        $productos = inventario::where('nombre', 'like', "%$query%")
            ->orWhere('codigo', 'like', "%$query%")
            ->get();

        return response()->json($productos);
    }

    public function refrescarVentas()
    {
        $ventas=Ventas::all();;
        $total = DB::table('ventas')->sum('subtotal');
       
        return view('POS')->with('ventas', $ventas)->with('total', $total);
        }

}
