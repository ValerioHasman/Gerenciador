<?php

class Pessoas{

    private int $id;
    private string $nome;
    private string $cpf;

    public function __construct(){}

    public function __set($atributo, $value)
    {
        if ($atributo = 'nome'){
            $this->atributo = $value;
        }
        if ($atributo = 'cpf'){
            $this->atributo = $value;
        }
    }


    public function __get($atributo)
    {
        return $this->atributo;
    }

}