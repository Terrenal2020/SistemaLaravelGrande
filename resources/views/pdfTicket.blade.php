<!DOCTYPE html>
<html>
<head>
    <title>Ticket de Venta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .text-center {
            margin-bottom: 20px;
        }
        table {
            margin-bottom: 20px;
        }
        table th,
        table td {
            padding: 10px;
            text-align: center;
        }
        .text-right {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h3>Ticket de compra - Abarrotes Sucursal GRAND</h3>
            <p>Dirección: Calle Principal #123, Colotlipa</p>
            <p>C.P 39253</p>
            <p>¡El mejor lugar para tus compras!</p>
        </div>
        <div class="text-center">
            <h4>Nombre del cliente: PUBLICO EN GENERAL</h4>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Num</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unitario</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <th scope="row">{{ $venta->id }}</th>
                    <td>{{ $venta->codigo }}</td>
                    <td>{{ $venta->nombre }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->precioUnitario }}</td>
                    <td>{{ $venta->subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <h5>Cantidad de Artículos: {{ count($ventas) }}</h5>
            <h5>Total de venta: ${{ $total }}</h5>
        </div>
    </div>
</body>
</html>
