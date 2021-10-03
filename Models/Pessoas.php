<?php

class Pessoas
{

    private ?int $id;
    private string $nome;
    private string $cpf;
    private Usuario $ususario;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'nome'){
            $this->$atributo = $value;
        }
        if ($atributo == 'cpf'){
            $this->$atributo = $value;
        }
        if ($atributo == 'usuario'){
            $this->$atributo = $value;
        }
    }


    public function __get($atributo)
    {
        return $this->$atributo;
    }

}