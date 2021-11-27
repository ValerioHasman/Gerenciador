<?php

namespace Controller;

use Core\Controller;
use Models\Usuario;

class HomeController extends Controller
{

    public function index(): void
    {
        
        $this->sessaoLigada();
        
        if (!empty($_POST['email'] ) && !empty($_POST['senha']) && empty($_POST['nome']) ){

            $usuario = new Usuario();
            $usuario->email = $_POST['email'];
            $usuario->senha = $_POST['senha'];
            $usuario->logar();

        }
        if ( !empty($_POST['nome'] ) && !empty($_POST['email'] ) && !empty($_POST['senha'])){

            $usuario = new Usuario();
            $usuario->nome = $_POST['nome'];
            $usuario->email = $_POST['email'];
            $usuario->senha = $_POST['senha'];
            $usuario->cadastrar();

        }

        $this->carregarTemplate('home/home', array());
    }
}
