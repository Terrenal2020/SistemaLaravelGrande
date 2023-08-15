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
            <form method="POST" action="{{ route('guardarProveedores') }}">
                @csrf
                <h3> Datos Registro de los proveedores</h3>
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
                        <label for="nombre" class="control-label">{{ 'Direccion' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                            name="direccion" id="direccion" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                            value="{{ isset($datos->nombre) ? $datos->nombre : old('nombre') }}">
                        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="descripcion" class="control-label">{{ 'Estado' }}<span
                                class="text-danger">*</span></label>
                                <select class=form-control name="estado">
                                    <option value="no">Seleccione uno...</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="CDMX">Ciudad de México</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de México">Estado de México</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group " >
                        <label for="clave" class="control-label">{{ 'telefono' }}<span
                                class="text-danger">*</span></label>
                                <input type="text" name="telefono" id="telefono" required class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }}" name="ruta" id="telefono" required value="{{ isset($datos->ruta) ? $datos->clave : old('nombre') }}" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="correo" class="control-label">{{ 'Correo electrónico' }}<span class="text-danger">*</span></label>
                        <input type="email" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}"
                            name="correo" id="correo" required
                            value="{{ isset($datos->correo) ? $datos->correo : old('correo') }}">
                        {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                    <label for="descripcion" class="control-label">{{ 'Categoria' }}<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }} "
                        name="categoria" id="categoria" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras" required
                        value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}">
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
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
