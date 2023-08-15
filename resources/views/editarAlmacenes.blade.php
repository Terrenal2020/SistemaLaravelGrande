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
            <form action="{{ route('modificarAlmacenes', $almacenes->id) }}"  method="POST">
                @method('PUT')
                @csrf
                <h3> Datos de Modificación de Almacenes</h3>
                <p>Los campos marcados con <span class="text-danger">*</span> son obligatorios.</p><br>

                <div class="row">


                    <div class="col-lg-4 col-sm-12 form-group ">
                        <label for="nombre" class="control-label">{{ 'Nombre' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                            name="nombre" id="nombre" title="Solo admite letras" required
                            value="{{$almacenes->nombre}}">
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="direccion" class="control-label">{{ 'Direccion' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('apPaterno') ? 'is-invalid' : '' }} "
                            name="direccion" id="direccion" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras"
                            required value="{{$almacenes->direccion}}">
                        {!! $errors->first('apPaterno', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="apMaterno" class="control-label">{{ 'Telefono' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('apMaterno') ? 'is-invalid' : '' }} "
                            name="telefono" id="telefono" pattern="[A-Z a-z \ A-Zs a-z]+"
                            title="Solo admite letras" required value="{{$almacenes->telefono}}">
                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="apMaterno" class="control-label">{{ 'Codigo Postal' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('apMaterno') ? 'is-invalid' : '' }} "
                            name="codigopostal" id="codigopostal" pattern="[A-Z a-z \ A-Zs a-z]+"
                            title="Solo admite letras" required value="{{$almacenes->codigopostal}}">
                        {!! $errors->first('codigopostal', '<div class="invalid-feedback">:message</div>') !!}
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