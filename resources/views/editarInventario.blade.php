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
 <div align="center">
    <div class="card-body">

        <div>
            <form action="{{ route('modificarInventario', $inventario->id) }}"  method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <h3> Datos a Modificar del Inventario</h3>
                <p>Los campos marcados con <span class="text-danger">*</span> son obligatorios.</p><br>

                <div class="row">
                    <div class="col-lg-4 col-sm-12 form-group ">
                        <label for="nombre" class="control-label">{{ 'Codigo' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                            name="codigo" id="codigo" title="Solo admite letras" required
                            value="{{$inventario->codigo}}">
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-lg-4 col-sm-12 form-group ">
                        <label for="nombre" class="control-label">{{ 'Nombre' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                            name="nombre" id="nombre" title="Solo admite letras" required
                            value="{{$inventario->nombre}}">
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for=telefono" class="control-label">{{ 'Existencia' }}<span
                                class="text-danger">*</span></label>
                                <input type="text" name="existencia" id="existencia" required class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }}" name="ruta" id="telefono" required  required value="{{$inventario->existencia}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!} 
                    </div>
                    
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="direccion" class="control-label">{{ 'Precio Unitario' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('apPaterno') ? 'is-invalid' : '' }} "
                            name="precioUnitario" id="precioUnitario" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras"
                            required value="{{$inventario->precioUnitario}}">
                        {!! $errors->first('precioUnitario', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="categoria_id" class="control-label">{{ 'Categoria de Producto' }}<span class="text-danger">*</span></label>
                        <select class="custom-select {{ $errors->has('departamento') ? 'is-invalid' : '' }}" name="departamento" id="departamento">
                            @foreach ($categoriaProductos as $item)
                                <option value="{{ $item->nombre }}" {{ $item->nombre == $inventario->departamento ? 'selected' : '' }}>
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="direccion" class="control-label">{{ 'Proveedor' }}<span
                                class="text-danger">*</span></label>
                                <select class="custom-select {{ $errors->has('proveedor') ? 'is-invalid' : '' }}" name="proveedor" id="proveedor">
                                    @foreach ($proveedores as $itemm)
                                        <option value="{{ $itemm->nombre }}" {{ $itemm->nombre == $inventario->proveedor ? 'selected' : '' }}>
                                            {{ $itemm->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="direccion" class="control-label">{{ 'Almacen' }}<span
                                class="text-danger">*</span></label>
                                <select class="custom-select {{ $errors->has('complexion') ? 'is-invalid' : '' }}" name="almacen" id="almacen">
                                    @foreach ($almacenes as $item)
                                        <option value="{{ $item->nombre }}" {{ $item->nombre == $inventario->almacen ? 'selected' : '' }}>
                                            {{ $item->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label class="control-label">Impuesto<span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="impuesto" id="iepsRadio" value="ieps" {{ $inventario->ieps > 0 ? 'checked' : '' }} required>
                            <label class="form-check-label" for="iepsRadio">IEPS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="impuesto" id="ivaRadio" value="iva" {{ $inventario->iva > 0 ? 'checked' : '' }} required>
                            <label class="form-check-label" for="ivaRadio">IVA</label>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="importe" class="control-label">Importe<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="importe" id="importe" required min="0" value="{{ $inventario->ieps > 0 ? $inventario->ieps : $inventario->iva }}">
                    </div>
                    </div>
                  
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Modificar</button>
                </div>
            </form>

        </div>
    </div>

</div>

@stop