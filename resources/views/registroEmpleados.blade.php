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
                <a class="nav-link text-white" href="">Iniciar Registro </a>

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
            <form method="POST" action="{{ route('guardar') }}">
                @csrf
                <h3> Datos Registro de los empleados</h3>
                <p>Los campos marcados con <span class="text-danger">*</span> son obligatorios.</p><br>
               
                <div class="row">
                   
                   
                <div class="col-lg-4 col-sm-12 form-group " >
                        <label for="clave" class="control-label">{{ 'Nombre' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }} "
                            name="nombre" id="nombre"  title="Solo admite letras" required
                            value="{{ isset($datos->clave) ? $datos->clave : old('nombre') }}">
                        {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                   
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="nombre" class="control-label">{{ 'Apellido Paterno' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                            name="apellidoPaterno" id="apellidoPaterno" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                            value="{{ isset($datos->nombre) ? $datos->nombre : old('nombre') }}">
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="descripcion" class="control-label">{{ 'Apellido Materno' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }} "
                            name="apellidoMaterno" id="apellidoMaterno" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                            value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}">
                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group " >
                        <label for="clave" class="control-label">{{ 'Contraseña' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }} "
                            name="contrasena" id="contrasena"  title="Solo admite letras" required
                            value="{{ isset($datos->clave) ? $datos->clave : old('nombre') }}">
                        {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="sexo" class="control-label">{{ 'Sexo' }}<span class="text-danger">*</span></label>
                        <select class="form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}" name="sexo" id="sexo" required>
                            <option value="">Seleccione</option>
                            <option value="Hombre" {{ (isset($datos->sexo) && $datos->sexo == 'Hombre') ? 'selected' : '' }}>Hombre</option>
                            <option value="Mujer" {{ (isset($datos->sexo) && $datos->sexo == 'Mujer') ? 'selected' : '' }}>Mujer</option>
                        </select>
                        {!! $errors->first('sexo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="cargo" class="control-label">{{ 'Cargo' }}<span class="text-danger">*</span></label>
                        <select class="form-control {{ $errors->has('cargo') ? 'is-invalid' : '' }}" name="cargo" id="cargo" required>
                            <option value="">Seleccione</option>
                            <option value="Vendedor" {{ (isset($datos->cargo) && $datos->cargo == 'Vendedor') ? 'selected' : '' }}>Vendedor</option>
                            <option value="Almacenero" {{ (isset($datos->cargo) && $datos->cargo == 'Almacenero') ? 'selected' : '' }}>Almacenero</option>
                            <option value="Cajero" {{ (isset($datos->cargo) && $datos->cargo == 'Cajero') ? 'selected' : '' }}>Cajero</option>
                        </select>
                        {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
               <div class="col-lg-4 col-sm-12 form-group">
                        <label for="descripcion" class="control-label">{{ 'Direccion' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }} "
                            name="direccion" id="direccion" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                            value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}">
                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                    <label for="descripcion" class="control-label">{{ 'Telefono' }}<span
                            class="text-danger">*</span></label>
                            <input type="text" name="telefono" id="telefono" required class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }}" name="ruta" id="telefono" required value="{{ isset($datos->ruta) ? $datos->clave : old('nombre') }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}     
            
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
    <div align="center">
        <a class="btn btn-primary" href="">REGISTRAR NUEVOS EMPLEADOS </a>
    </div>
    <br>
    <div>
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

            <li class="nav-item">
                <a class="nav-link active disabled ">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="">Almacenes </a>

            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Proveedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Departamentos</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="">Inventarios</a>
            </li>
          
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
