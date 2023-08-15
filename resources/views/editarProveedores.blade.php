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
            <form action="{{ route('modificarProveedores', $proveedores->id) }}"  method="POST">
                @method('PUT')
                @csrf
                <h3> Datos Registro Inicial</h3>
                <p>Los campos marcados con <span class="text-danger">*</span> son obligatorios.</p><br>

                <div class="row">


                    <div class="col-lg-4 col-sm-12 form-group ">
                        <label for="nombre" class="control-label">{{ 'Nombre' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }} "
                            name="nombre" id="nombre" title="Solo admite letras" required
                            value="{{$proveedores->nombre}}">
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="direccion" class="control-label">{{ 'Direccion' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('apPaterno') ? 'is-invalid' : '' }} "
                            name="direccion" id="direccion" pattern="[A-Z a-z \ A-Zs a-z]+" title="Solo admite letras"
                            required value="{{$proveedores->direccion}}">
                        {!! $errors->first('apPaterno', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="descripcion" class="control-label">{{ 'Estado' }}<span
                                class="text-danger">*</span></label>
                                <select class=form-control name="estado">
                                    <option value="no">Seleccione uno...</option>
                                    <option value="Aguascalientes"{{ $proveedores->estado == 'Aguascalientes' ? 'selected' : '' }}>Aguascalientes</option>
                                    <option value="Baja California"{{ $proveedores->estado == 'Baja California' ? 'selected' : '' }}>Baja California</option>
                                    <option value="Baja California Sur"{{ $proveedores->estado == 'Baja California Sur' ? 'selected' : '' }}>Baja California Sur</option>
                                    <option value="Campeche"{{ $proveedores->estado == 'Campeche' ? 'selected' : '' }}>Campeche</option>
                                    <option value="Chiapas"{{ $proveedores->estado == 'Chiapas' ? 'selected' : '' }}>Chiapas</option>
                                    <option value="Chihuahua"{{ $proveedores->estado == 'Aguascalientes' ? 'selected' : '' }}>Chihuahua</option>
                                    <option value="CDMX"{{ $proveedores->estado == 'Ciudad de México' ? 'selected' : '' }}>Ciudad de México</option>
                                    <option value="Coahuila"{{ $proveedores->estado == 'Coahuila' ? 'selected' : '' }}>Coahuila</option>
                                    <option value="Colima"{{ $proveedores->estado == 'Aguascalientes' ? 'selected' : '' }}>Colima</option>
                                    <option value="Durango"{{ $proveedores->estado == 'Durango' ? 'selected' : '' }}>Durango</option>
                                    <option value="Estado de México"{{ $proveedores->estado == 'Estado de México' ? 'selected' : '' }}>Estado de México</option>
                                    <option value="Guanajuato"{{ $proveedores->estado == 'Guanajuato' ? 'selected' : '' }}>Guanajuato</option>
                                    <option value="Guerrero"{{ $proveedores->estado == 'Guerrero' ? 'selected' : '' }}>Guerrero</option>
                                    <option value="Hidalgo"{{ $proveedores->estado == 'Aguascalientes' ? 'selected' : '' }}>Hidalgo</option>
                                    <option value="Jalisco"{{ $proveedores->estado == 'Jalisco' ? 'selected' : '' }}>Jalisco</option>
                                    <option value="Michoacán"{{ $proveedores->estado == 'Michoacán' ? 'selected' : '' }}>Michoacán</option>
                                    <option value="Morelos"{{ $proveedores->estado == 'Morelos' ? 'selected' : '' }}>Morelos</option>
                                    <option value="Nayarit"{{ $proveedores->estado == 'Nayarit' ? 'selected' : '' }}>Nayarit</option>
                                    <option value="Nuevo León"{{ $proveedores->estado == 'Nuevo' ? 'selected' : '' }}>Nuevo León</option>
                                    <option value="Oaxaca"{{ $proveedores->estado == 'Aguascalientes' ? 'selected' : '' }}>Oaxaca</option>
                                    <option value="Puebla"{{ $proveedores->estado == 'Puebla' ? 'selected' : '' }}>Puebla</option>
                                    <option value="Querétaro"{{ $proveedores->estado == 'Querétaro' ? 'selected' : '' }}>Querétaro</option>
                                    <option value="Quintana Roo"{{ $proveedores->estado == 'Quintana Roo' ? 'selected' : '' }}>Quintana Roo</option>
                                    <option value="San Luis Potosí"{{ $proveedores->estado == 'San Luis Potosí' ? 'selected' : '' }}>San Luis Potosí</option>
                                    <option value="Sinaloa"{{ $proveedores->estado == 'Sinaloa' ? 'selected' : '' }}>Sinaloa</option>
                                    <option value="Sonora"{{ $proveedores->estado == 'Sonora' ? 'selected' : '' }}>Sonora</option>
                                    <option value="Tabasco"{{ $proveedores->estado == 'Tabasco' ? 'selected' : '' }}>Tabasco</option>
                                    <option value="Tamaulipas"{{ $proveedores->estado == 'Tamaulipas' ? 'selected' : '' }}>Tamaulipas</option>
                                    <option value="Tlaxcala"{{ $proveedores->estado == 'Tlaxcala' ? 'selected' : '' }}>Tlaxcala</option>
                                    <option value="Veracruz"{{ $proveedores->estado == 'Veracruz' ? 'selected' : '' }}>Veracruz</option>
                                    <option value="Yucatán"{{ $proveedores->estado == 'Yucatán' ? 'selected' : '' }}>Yucatán</option>
                                    <option value="Zacatecas"{{ $proveedores->estado == 'Zacatecas' ? 'selected' : '' }}>Zacatecas</option>
                                </select>
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="apMaterno" class="control-label">{{ 'Telefono' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('apMaterno') ? 'is-invalid' : '' }} "
                            name="telefono" id="telefono" pattern="[A-Z a-z \ A-Zs a-z]+"
                            title="Solo admite letras" required value="{{$proveedores->telefono}}">
                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="correo" class="control-label">{{ 'Correo electrónico' }}<span class="text-danger">*</span></label>
                        <input type="email" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}"
                            name="correo" id="correo" required
                            value="{{$proveedores->correo}}">
                        {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-lg-4 col-sm-12 form-group">
                        <label for="apMaterno" class="control-label">{{ 'Categoria' }}<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('apMaterno') ? 'is-invalid' : '' }} "
                            name="categoria" id="categoria" pattern="[A-Z a-z \ A-Zs a-z]+"
                            title="Solo admite letras" required value="{{$proveedores->categoria}}">
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