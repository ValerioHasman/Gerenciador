<?php

abstract class Controller
{

    public array $dados;

    public function __construct()
    {
    }

    public function carregarTemplate(string $nomeView, array $dadosModel): void
    {
        require_once 'Views/template/template.php';
    }

    public function carregarTemplateDoSistema(string $nomeView, array $dadosModel): void
    {
        require_once 'Views/template/templateDoSistema.php';
    }

    public function carregarViewNoTemplate(string $nomeView, array $dadosModel): void
    {
        extract($dadosModel);
        require_once 'Views/' . $nomeView . '.php';
    }

    protected function sessaoDesligada(): void
    {
        if( !empty( $_SESSION['usu_id'])
        && !empty( $_SESSION['usu_nome'])
        && !empty( $_SESSION['usu_email'])){
            header('Location: sistema');
            exit;
        }
    }
    protected function sessaoLigada()
    {
        if( empty( $_SESSION['usu_id'])
        && empty( $_SESSION['usu_nome'])
        && empty( $_SESSION['usu_email'])){
            header('Location: home');
            exit;
        }
    }
    
}
