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
            <form method="POST" action="{{ route('guardarAlmacenes') }}">
                @csrf
                <h3> Datos Registro del almacen</h3>
                <p>Los campos marcados con <span class="text-danger">*</span> son obligatorios.</p><br>
               
                <div class="row">
                   
                   
                <div class="col-lg-4 col-sm-12 form-group " >
                        <label for="clave" class="control-label">{{ 'Nombre del almacen' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }} "
                            name="nombre" id="nombre"  title="Solo admite letras" required
                            value="{{ isset($datos->clave) ? $datos->clave : old('nombre') }}">
                        {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                   
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="direccion" class="control-label">{{ 'Direccion' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                            name="direccion" id="direccion" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                            value="{{ isset($datos->nombre) ? $datos->nombre : old('nombre') }}">
                        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for=telefono" class="control-label">{{ 'Telefono' }}<span
                                class="text-danger">*</span></label>
                                <input type="text" name="telefono" id="telefono" required class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }}" name="ruta" id="telefono" required value="{{ isset($datos->ruta) ? $datos->clave : old('nombre') }}"  maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group " >
                        <label for="clave" class="control-label">{{ 'Codigo Postal' }}<span
                                class="text-danger">*</span></label>
                                <input type="text" name="codigo" id="codigo" required class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }}" name="ruta" id="telefono" required value="{{ isset($datos->ruta) ? $datos->clave : old('nombre') }}" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                  
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>

</div>

<br>
<!-- partial -->
<?php
if ($_SESSION['idUsuario'] ==1) {
?>
    
    <br>
    <div>
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

           
        </ul>
    </div>
<?php
} ?>

<br>
<div align="center">
    <footer class="main-footer">
   
  </footer>
</div>
@endsection
