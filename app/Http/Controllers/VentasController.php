<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;


use App\Models\inventario;
class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function aumentar(){
        $venta = Ventas::latest('id')->first();
    if ($venta) {
        $cantidad = $venta->cantidad;   
        $precioUnitario=$venta->precioUnitario;
        $subtotal = $venta->subtotal;   
        $nombre = $venta->nombre;   


        $venta->cantidad = $cantidad+1;
        $venta->subtotal=$subtotal+$precioUnitario;
        $venta->save();
        $ventas=Ventas::all();;
        alert()->warning('Mensaje', 'Aumentado '. $nombre);
        $total = DB::table('ventas')->sum('subtotal');
        return view('POS')->with('ventas', $ventas)->with('total', $total);

        } else {
        // If no record is found, display an error message
        alert()->warning('Mensaje', 'No se encontró ningún registro');
       // return redirect()->route('route.name');
    }
      alert()->warning('Mensaje', 'hhhh No encontrado');

     }


     public function disminuir()
     {
         $venta = Ventas::latest('id')->first();  
         if ($venta) {
             $cantidad = $venta->cantidad;   
             $precioUnitario = $venta->precioUnitario;
             $subtotal = $venta->subtotal;   
             $nombre = $venta->nombre;   
     
             $venta->cantidad = $cantidad - 1;
             $venta->subtotal = $subtotal - $precioUnitario;
             $venta->save();
     
             if ($venta->cantidad === 0) {
                 $venta->delete();
                 alert()->warning('Mensaje', 'Registro eliminado');
             } else {
                 alert()->warning('Mensaje', 'Disminuir ' . $nombre);
             }
     
             $ventas = Ventas::all();
             $total = DB::table('ventas')->sum('subtotal');
             return view('POS')->with('ventas', $ventas)->with('total', $total);
         } else {
             // If no record is found, display an error message
             alert()->warning('Mensaje', 'No se encontró ningún registro');
             // return redirect()->route('route.name');
         }
     }




    public function getMostrarPoos(){
        $ventas=Ventas::all();;
        $total = DB::table('ventas')->sum('subtotal');
        $resultados="";
        return view('POS')->with('ventas',$ventas)->with('total', $total)->with('resultados',$resultados);

     //   return view('POS');
    }

    public function buscarProductos(Request $request)
    {
        $query = $request->input('query');

        $productos = inventario::where('nombre', 'like', "%$query%")
            ->orWhere('codigo', 'like', "%$query%")
            ->get();

        return response()->json($productos);
    }

    public function actualizarInventario()
    {
        $ventas = Ventas::all();
        
        foreach ($ventas as $venta) {
            $nombre = $venta->nombre;
            $cantidad = $venta->cantidad;
            
            $producto = DB::table('inventarios')->where('nombre', $nombre)->first();
            
            if ($producto) {
                $nuevaExistencia = $producto->existencia - $cantidad;
                
                DB::table('inventarios')->where('nombre', $nombre)->update(['existencia' => $nuevaExistencia]);
            }
        }
        //DB::table('ventas')->truncate();
        //DB::statement('ALTER TABLE ventas AUTO_INCREMENT = 1');
        
        $ventas = Ventas::all();
        $total = DB::table('ventas')->sum('subtotal');
       
    
        $pdf = PDF::loadView('pdfTicket', compact('ventas', 'total'));
        $pdf->save('ventas.pdf'); // Guardar el PDF en el servidor
        DB::table('ventas')->truncate();
        DB::statement('ALTER TABLE ventas AUTO_INCREMENT = 1');
        $ventass = Ventas::paginate(3);
        $totall = DB::table('ventas')->sum('subtotal');
        return view('POS')->with('ventas', $ventass)->with('total', $totall);
    }

    public function refrescarVentas()
    {
        $ventas=Ventas::all();;
        $total = DB::table('ventas')->sum('subtotal');
       
        return view('POS')->with('ventas', $ventas)->with('total', $total);
        }
    public function generarPDFVentas()
{
    
}

    public function confirmarVenta(){
        
    }


    public function index()
    {
        //
    }
    public function cancelar()
    {
        DB::table('ventas')->truncate();
        DB::statement('ALTER TABLE ventas AUTO_INCREMENT = 1');
        $ventas=Ventas::paginate(3);;
        $total = DB::table('ventas')->sum('subtotal');
        return view('POS')->with('ventas',$ventas)->with('total', $total);

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
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show(Ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ventas=Ventas::findOrFail($id);
        $ventas->delete();
        //return redirect('productos');
        alert()->error('Mensaje','Producto Eliminado');

            return back();
    }
}
