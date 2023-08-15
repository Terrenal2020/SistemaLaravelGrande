<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>{{ __('Sistema de Venta') }}</title>
</head>

<body style="background: #EEEEEE;">
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #E7EEFF;">
            <!--class="navbar navbar-light" style="background-color: #e3f2fd;"-->
            <div class="container">
                <img src="images.png" width="150" height="80">
                <div style="display: inline-block;">
                    <a href="{{ url('/') }}"
                        style="color: #014799; font-weight: 1000; font-size: 20px;">{{ __('Sistema Sucursal ') }}</a><br>
                    <a href="{{ url('/') }}"
                        style="color: #014799; font-weight: bold; font-size: 20px;">{{ __('ABARROTES GRAND ') }}</a>
                </div>
                <!--<a class="navbar-brand" href="{{ url('/') }}">{{ __(' No Localizados ') }}</a>-->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                </div>
            </div>
        </nav>
    </div>
    <!-- background: linear-gradient(180deg, #EEEEEE, white); -->
    <div class="container" style="background: #FCFCFC;">
        @yield('seccion')
        @include('sweetalert::alert')
    </div>
    <br><br><br>
    <footer>
        <div class="card-footer text-muted" style="background-color: #4254b5;">
            <div>
                <div class="row">
                    <div>
                        <br>
                        <img src="public/descarga.jfif" width="100"
                            height="100">
                    </div>
                    <div class="card-body">
                        <div class="card-title" style="color:#000000; font-family:fantasy">
                            <h2>Acerca de nosotros</h2>
                        </div>

                        <span class="text-white"> Municipio: Quechultenango, Gro. Entidad: Guerrero Colonia: Centro
                            Código postal: 39250 <br>
                            Teléfono: 7564746004 <br></span>

                    </div>
                    <div class="card-body">
                        <div class="card-title" style="color:#000000; font-family:fantasy">
                            <h2>Síguenos</h2>
                        </div>
                        <a href=""><img
                                src="https://cdn.iconscout.com/icon/free/png-256/facebook-social-media-fb-logo-square-44659.png"
                                width="50" height="50"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS        
        <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>	-->
</body>

</html>
