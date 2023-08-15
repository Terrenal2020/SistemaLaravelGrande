<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\usuarios;
use Alert;


class UsuariosController extends Controller
{
    //
     //inicio de sesion

     public function inicioSesion( Request $request ) {
        //inicio validacion de campos
        $campos = [
            'usuario' => 'required|string|max:100',
            'contrasena' => 'required|string|max:100'
        ];
        $Mensaje = ['required' => 'El atributo es requerido'];
        $this->validate( $request, $campos, $Mensaje );
        //fin validacion de campos

        $usuario = $request->usuario;
        $contr = $request->contrasena;
       
        
      // $personasss=DB::table('actores')->where('id', \DB::raw("(select max(`id`) from actores)"))->get();

        $usuarioB = DB::table('usuarios')->where( 'nombreUsuario', '=', $usuario )->where( 'contrasena', '=', $contr )->get();

        $idUsuario=
        DB::select('select id from usuarios where nombreUsuario = ? and contrasena=?', [
            $usuario,
            $contr
            ]
        );
        

        if ( strlen( $usuarioB ) > 2 ) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['idUsuario'] = $idUsuario[0]->id;
            //$idCargo=
            //DB::select('select cargo from datos_personals where usuario_id= ?', [$_SESSION['idUsuario']]);
            //$_SESSION['idCargo']=$idCargo[0]->cargo;
        alert()->success('Bienvenido','Sistema Sucursal GranD');

           // Alert::info('Info Title', 'Info Message');
            return view('menuprincipal');
            
        } else {
            echo "<script>alert('Usuario incorrecto');</script>";
            //Alert::info('Info Title', 'Info Message');

            alert()->error('Error','usuario incorrecto');

            return back();
        }
    }
}
