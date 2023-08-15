@livewireStyles

<style>
  .table th,
.table td {
    font-size: 14px;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  window.addEventListener('DOMContentLoaded', (event) => {
      document.getElementById('buscarProducto').focus();
  });
</script>

<script>
  // Capturar evento de tecla
  document.addEventListener('keydown', function(event) {
      if (event.key === 'F3') {
          event.preventDefault(); // Prevenir comportamiento predeterminado (por ejemplo, abrir la ayuda del navegador)
          // Aquí puedes realizar la lógica correspondiente al presionar la tecla F2
          // Por ejemplo, puedes llamar a una función de JavaScript o redirigir a una URL específica
          window.location.href = "{{ route('aumentar') }}";
      }
  });
</script>
<script>
  // Capturar evento de tecla
  document.addEventListener('keydown', function(event) {
      if (event.key === 'F2') {
          event.preventDefault(); // Prevenir comportamiento predeterminado (por ejemplo, abrir la ayuda del navegador)
          // Aquí puedes realizar la lógica correspondiente al presionar la tecla F2
          // Por ejemplo, puedes llamar a una función de JavaScript o redirigir a una URL específica
          window.location.href = "{{ route('disminuir') }}";
      }
  });
</script>

<script>
  $(document).ready(function() {
  $('#montoPago').on('input', function() {
    var montoPago = parseFloat($(this).val());
    var totalVenta = parseFloat($('#totalVenta').text().replace('$', ''));
    var cambio = montoPago - totalVenta;
   
    $('#cambio').val(cambio.toFixed(2));
  });
});


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#buscarProducto").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $.ajax({
      url: "'{{ route('buscarProductos') }}'", // Ruta a tu controlador de búsqueda en Laravel
      type: "POST",
      data: { query: value },
      success: function(response) {
        // Manejar la respuesta del servidor y actualizar los resultados en la página
        $("#myList").empty(); // Limpiar la lista actual
        response.forEach(function(item) {
          $("#myList").append("<li>" + item.name + "</li>"); // Agregar los resultados a la lista
        });
      },
      error: function(xhr) {
        console.log(xhr.responseText); // Manejar cualquier error en la consola
      }
    });
  });
});
</script> 
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
            <li class="nav-item">
                <a class="nav-link text-white" >POS</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" >Datos del Usuario</a>
            </li>
            <label style=" margin-left: 2%; padding-top:1%; color: rgb(162, 152, 216) ">BIENVENIDO AL SISTEMA: </label>

            <label style=" margin-left: 2%; padding-top:0.5%; color: rgb(162, 152, 216)"><big>{{ $_SESSION['usuario']}}</big> </label>

            <label style=" margin-left: 25%; padding-top:1%; color: rgb(162, 152, 216)"><a style="color:rgb(162, 152, 216)" href="{{ url('/') }}">[->]Salir</a></label>
        </ul>
    </div>
</div>
<br>
<div class="row">
    
<section class="content" id="main_content_sale">
    <div class="row">
      <div class="col-md-9 " style="" >
        <div class="card card-primary card-outline div_radius">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                     
                        <form  method="POST" action="{{ route('buscarProducto') }}">
                          @csrf
                          
                        <div class="input-group mb-3 ">
                        
                          <div class="input-group-prepend">
                            
                              <span class="input-group-text bg-info" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                          
                            </div> 
                          
          <input  type="text" id="buscarProducto" name="nombre" class="form-control input-search" placeholder="Buscar por el nombre">
                        
          <ul id="autocompleteventa" tabindex='1' class="list-group">
                              <div>
                                @livewire('search-products')
                            </div>
                        </ul> 
                      
                          </form>

                      </div>
                    </div>                        
                  </div>
                  <div class="col-md-3 text-center" >
                    <div class="form-group py-2">
                      <div class="form-check form-switch">
                        <div class="form-check form-switch">
                          
                          <input class="form-check-input" type="checkbox" id="barcodeChecked" checked>
                          <label class="form-check-label" for="barcodeChecked">Codigo de barras</label>
                         
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  
              </div>
              
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="">F2 Disminuir ultima compra</label>
                      </div>
                  </div>
                  
                  
                  <div class="col-md-3">
                      <div class="form-group">
                        <h5>Total: ${{ $total }}</h5>
                   
                      </div>
                      
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="">F3 Aumentar ultima compra  del producto</label>
                    </div>
                </div>
                
                  
              </div>
               
          </div>
          <div class="card-body" style="margin-top: -18px;">
            <!-- <h5 class="card-title">Special title treatment</h5> -->
            <form method="POST" action="" accept-charset="UTF-8" id="save_venta_total"><input name="_token" type="hidden" value="5hUIiiF0rpRxbo34ptBcCu3zV7n3CRhRVkBEf8zu">
            <div class="tableFixHead">
              <!--ID USER PARA LAVENTA-->
              <input type="text" size="4"  id="id_user_vent" name="id_user_vent" value="1" hidden="true">
              <!--EL ID DE LA CAJA QUE EL CAJERO TIENE ACCESO-->
              <input type="number" name="inicioapertura" value="695" id="inicioapertura" hidden="true">
              <div id="resultadoBusqueda">
                <div style="max-height: 300px; overflow: auto;">
                <table class="table">
                  <thead class="thead-dark">
                      <tr>
                      
                      <th scope="col">id</th>
                          <th scope="col">codigo</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Precio Unitario</th>
                          <th scope="col">SubTotal</th>
                          <th scope="col">Accciones</th>
                         
                         
                      </tr>
                  </thead>
                  <tbody id="resultsTableBody">
                    @foreach($ventas as $ventass)
    <tr >
    <th scope="row">{{$ventass->id}}</th>
        <td>{{$ventass->codigo}}</td>
        <td>{{$ventass->nombre}}</td>

        <td>{{$ventass->cantidad}}</td>
        <td>{{$ventass->precioUnitario}}</td>
        <td>{{$ventass->subtotal}}</td>
         
     
        <form action="{{ route('eliminarVenta',$ventass->id)}}" method="POST">
          @csrf

          @method('DELETE')
          <td><button type="submit" class="btn btn-danger" >Borrar </button></td>
         
      </form>
       

                      
    </tr>
    @endforeach
                  </tbody>
                </table>
            
                </div>
            </div>

              <!-- /.table -->
              
            </div>
            <div class="container" style="border:1px solid #A9A9A9;">
                <div class="row">
                  <div class="col-md-3" style="">
                    <div class="btn-group" role="group" style="width:100%;height:100%;margin-left: -7px;">
                    
                    </div>
                  </div>
                  <div class="col-md-3" style=""></div>
                  <div class="col-md-3  text-right" style="">
                  </div>
                  <div class="col-md-3">
                    
                    
                  </div>
                </div>
              </div>
          </div>
        </div> 
      </div>
      <!-- /.col -->
      <div class="col-md-3 ">
        <!-- /.card-body -->
        <div class="card div_radius">
          <div class="card-header">
            <h3 class="card-title">Datos de la venta</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="container">
              <div class="mb-3">
                <label for="nombre">Cliente</label>
                <div class="input-group">
                  <input type="text" class="form-control" value="Publico en general" id="nomcliente" placeholder="Nombre del cliente" autocomplete="off" readonly>
                  <input type="hidden" name="ventidcliente" value="1" id="ventidcliente" size="3" placeholder="id del cliente" autocomplete="off">
                  <button type="button" class="btn btn6" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-users"></i></button>
                </div>
              </div>
              <div class="mb-2">
                <div class="row">
                  <div class="col">
                    <div class="group">
                      <label for="">Comprobante</label>
                      <select name="venttipo_comprobante" class="form-control" id="">
                        <option value="Ticket">Ticket</option>
                        <option value="Factura">Nota</option>
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="group">
                        <label for="">Folio</label>
                        <input type="text" name="ventfolio" id="ventfonio" value="1" class="form-control" placeholder="num de folio" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
          <!-- /.card-body -->
          <br>
        </div>
        <form id="formConfirmarVenta" action="{{ route('actualizarInventario') }}" method="POST">
          @csrf
        <div id="modalConfirmacion" class="modal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Confirmar venta</h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <label for="totalVenta">Total de Venta:</label>
                      <span id="totalVenta">${{ $total }}</span>
                      <br>
                      <label for="montoPago">Monto de pago:</label>
                      <input type="number" id="montoPago" name="montoPago" class="form-control" step="0.01" min="0" required oninput="calcularCambio()">
                      <br>
                      <label for="cambio">Cambio:</label>
                      <input type="number" id="cambio" name="cambio" class="form-control" step="0.01" min="0" readonly>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary" id="confirmarVentaBtn"">Confirmar</button>
                    </div>
              </div>
          </div>
      </div>
    </form>

        <!-- /.card -->
        <div class="card div_radius">
          <div class="card-header">
            <h3 class="card-title">Realizar venta</h3>

            <div class="card-tools">
              <form action="" method="POST">
                <button type="button" id="cancelventaproducto" class="btn btn-info btn-block btn-flat" data-toggle="modal" data-target="#modalConfirmacion">
                  Confirmar
              </button>
               
            </form>     
               </div>
          </div>
          <div class="card-body p-0">
            <div class="container">
              

              <div class="card-tools">
                <form action="{{ route('cancelarVenta') }}" method="POST">
                  @csrf
                  <!-- Rest of your form content -->
                  <button type="submit"  class="btn btn-danger btn-sm btn-block btn-round">Cancel</button>
              </form>       
                 </div>
              <div class="mb-3">
                <div class="row">
              
                </div>
              </div>
              <div class="mb-3">
                <div class="form-group">
                
                </div>
              </div>
            </div>              
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  $(document).ready(function() {
      // Obtén el valor inicial del campo
      var total = parseFloat($('#pvdescuento').val());

      // Realiza la suma en tiempo real
      $('.subtotal').each(function() {
          total += parseFloat($(this).text());
      });

      // Actualiza el valor en el campo de entrada
      $('#pvdescuento').val(total.toFixed(2));

      // Muestra el resultado de la suma en el elemento <span>
      $('#sumaTotal').text(total.toFixed(2));
  });
</script>


<br>
<!-- partial -->
<?php
if ($_SESSION['idUsuario'] ==1) {
?>
    <br>
    <div align="center">
       
    </div>
    <br>
    
<?php
} ?>
    
    


<br>
<div align="center">
    <footer class="main-footer">
        <div class="row">
            
 
  </footer>
</div>
@endsection

