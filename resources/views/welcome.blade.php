<?php
if(!isset($_SESSION)) 
{ 
    session_start();
    session_destroy(); 
} 

?>

@extends('plantilla')
@section('seccion')
@include('sweetalert::alert')

<div class="card">

    <div align="center"  class="card-body" style="background-color: #efefef;">

        <img class="card-img-top" style="width: 10%; height: 10%; margin-left: 1%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/768px-User_icon_2.svg.png">
        <div class="card-body">
            <form method="POST" action="{{route('sesionUsuarioNuevo')}}">
                @csrf
                <!--se agrego validacion en el campo usuario y contraseña-->
                <h3>Inicio de sesión</h3>
                <div class="col-lg-5 col-sm-12 form-group">
                    <label for="usuario" class="control-label">{{'Usuario'}}<span class="text-danger">*</span></label>
                    <input type="text" class="form-control {{$errors->has('usuario')?'is-invalid':'' }} " name="usuario" id="usuario" value="{{ isset($datos->usuario) ? $datos->usuario:old('usuario') }}">
                    {!! $errors->first('usuario','<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-lg-5 col-sm-12 form-group">
                    <label for="contrasena" class="control-label">{{'Contraseña'}}<span class="text-danger">*</span></label>
                    <input type="password" class="form-control {{$errors->has('contrasena')?'is-invalid':'' }} " name="contrasena" id="contrasena" value="{{ isset($datos->contrasena) ? $datos->contrasena:old('contrasena') }}">
                    {!! $errors->first('contrasena','<div class="invalid-feedback">:message</div>') !!}    
                </div>
                <!--fin de modificacion-->
                <button type="submit" class="btn btn-primary">Acceder</button>
               
            </form>
        </div>
    </div>
</div>

@stop