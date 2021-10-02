<?php

class Doses
{

    private ?int $id;
    private string $nome;
    private Usuario $usuario;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'nome'){
            $this->atributo = $value;
        }
        if ($atributo == 'usuario'){
            $this->atributo = $value;
        }
    }


    public function __get($atributo)
    {
        return $this->atributo;
    }

}