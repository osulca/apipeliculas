<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function mostrarFormulario(){
        return view("login");
    }

    public function login(Request $request){
        $username = $request->input("username");
        $usuario = Usuario::where("username", $username)->first();
        if($usuario!=null){
            if($usuario->password == $request->input("password")){
                return redirect("/");
            }
            else{
                return redirect("/login");
            }
        }else{
            return redirect("/login");
        }
    }
}
