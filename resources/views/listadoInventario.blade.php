<?php
if (!isset($_SESSION)) {
    header('Cache-Control: no cache'); //no cache
    session_cache_limiter('private_no_expire');
    session_start();
   // $_SESSION['nombre'] = null;
   // $_SESSION['apepat'] = null;
   // $_SESSION['apemat'] = null;
   // $_SESSION['curp'] = null;
} ?>
@extends('plantilla')
@section('seccion')
<div>
    <div>
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

            <li class="nav-item">
                <a class="nav-link active disabled ">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="{{ route('getMostrar')}}">Menu Principal</a>

            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Ventas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="">Datos del Administrador</a>
            </li>
            <label style=" margin-left: 2%; padding-top:1%; color: rgb(162, 152, 216) ">BIENVENIDO AL SISTEMA: </label>

            <label style=" margin-left: 2%; padding-top:0.5%; color: rgb(162, 152, 216)"><big>{{ $_SESSION['usuario']}}</big> </label>

            <label style=" margin-left: 25%; padding-top:1%; color: rgb(162, 152, 216)"><a style="color:rgb(162, 152, 216)" href="{{ url('/') }}">[->]Salir</a></label>
        </ul>
    </div>
</div>
<br>
<div>
    <div align="center">
        <h3> Datos del Inventario</h3>
        </div>
    <form method="POST" action="">
        @csrf
      
        <br>
        <div class="row">
        <div class="col-lg-4 col-sm-12 form-group">
        
                <a class="btn btn-primary" href="{{ route('getRegistroInventario') }}">Agregar Producto </a>
            
         {{--    <label for="expediente" class="control-label">{{ 'Nombre del almacen:' }}<span
                    class="text-danger"></span></label>
                    
           <input type="text" class="form-control "  name="busqueda" id="idFolio" >
            --}}
        </div>
        <div class="col-lg-4 col-sm-12 form-group">
           
        </div>
    </div>
       
            
    </form>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #FFFEE4;">

            <li class="nav-item">
                <a class="nav-link active " >Listado de Inventario</a>
            </li>
            <li  class="nav-item ml-auto">
                <form class="d-flex" action="{{ route('busquedaInventario') }}" method="post" >
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Codigo  o Nombre" aria-label="Search" name="nombre" id="nombre" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                  </form>
                            </li>
        </ul>
    </div>
</div>

<div align="center">
    <div class="card-body">

    <table class="table">
<thead class="thead-dark">
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Codigo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Existencia</th>
        <th scope="col">precio</th>
        <th scope="col">Departamento</th>
        <th scope="col">Proveedor</th>
        <th scope="col">Almacen</th>
        <th scope="col">IESP</th>
        <th scope="col">IVA</th>
       
       
       
    </tr>
</thead>
<tbody>
@foreach($inventario as $inventarioss)
    <tr>
    <th scope="row">{{$inventarioss->id}}</th>
    <td>{{$inventarioss->codigo}}</td>
        <td>{{$inventarioss->nombre}}</td>
        <td>{{$inventarioss->existencia}}</td>
        <td>{{$inventarioss->precioUnitario}}</td>
        <td>{{$inventarioss->departamento}}</td>
        <td>{{$inventarioss->proveedor}}</td>
        <td>{{$inventarioss->almacen}}</td>
        <td>{{$inventarioss->ieps}}</td>
        <td>{{$inventarioss->iva}}</td>

        
        <form action="{{ route('eliminar',$inventarioss)}}" method="POST">
                        @csrf

                        @method('DELETE')
                        <td><button type="submit" class="btn btn-danger" href="">Borrar </button></td>
                       
                    </form>
       
        <td><a class="btn btn-warning" href="{{ route('getEditarInventario',$inventarioss->id)}}">Editar </a></td>
                      
    </tr>
    
    @endforeach

</tbody>
</table>

{{ $inventario->links() }}    </div>

</div>


<br>
<!-- partial -->
<?php
if ($_SESSION['idUsuario'] ==1) {
?>
    <br>
    
    <br>
    
<?php
} ?>

<br>
<div align="center">
    <footer class="main-footer">
   
 
  </footer>
</div>
@endsection
