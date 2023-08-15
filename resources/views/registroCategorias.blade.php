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
<div align="center">
    <div class="card-body">

        <div>
            <form method="POST" action="{{ route('guardarCategoria') }}"  enctype="multipart/form-data">
                @csrf
                <h3> Datos Registro de categorias de productos</h3>
                <p>Los campos marcados con <span class="text-danger">*</span> son obligatorios.</p><br>
               
                <div class="row">
                   
                   
                <div class="col-lg-4 col-sm-12 form-group " >
                        <label for="clave" class="control-label">{{ 'Codigo' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }} "
                            name="codigo" id="codigo"  title="Solo admite letras" required
                            value="{{ isset($datos->clave) ? $datos->clave : old('nombre') }}">
                        {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                   
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="nombre" class="control-label">{{ 'Nombre' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                            name="nombre" id="nombre" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                            value="{{ isset($datos->nombre) ? $datos->nombre : old('nombre') }}">
                        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="descripcion" class="control-label">{{ 'Descripcion' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }} "
                            name="descripcion" id="descripcion" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                            value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}">
                        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                   
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="foto" class="control-label">Subir una imagen:<span class="text-danger">*</span></label>
                        <input type="file" name="foto" accept="image/png, .jpeg, .jpg, image/gif"
                            class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }} "
                            value="{{ isset($datos->foto) ? $datos->foto : old('foto') }}" required
                            onchange="document.getElementById('imagenM').src = window.URL.createObjectURL(this.files[0]); document.getElementById('imagenM').style.display = 'block';">
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

   
<?php
} ?>

<br>
<div align="center">
    <footer class="main-footer">
   
  </footer>
</div>
@endsection
