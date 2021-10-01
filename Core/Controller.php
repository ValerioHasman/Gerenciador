<?php

abstract class Controller
{

    public array $dados;

    public function __construct()
    {
    }

    public function carregarTemplate(string $nomeView, array $dadosModel): void
    {
        require_once 'Views/template.php';
    }

    public function carregarViewNoTemplate(string $nomeView, array $dadosModel): void
    {
        extract($dadosModel);
        require_once 'Views/' . $nomeView . '.php';
    }
}
