<?php

class Doses{

    private int $id;
    private string $nome;

    public function __construct(){}

    public function __set($atributo, $value)
    {
        if ($atributo = 'nome'){
            $this->atributo = $value;
        }
    }


    public function __get($atributo)
    {
        return $this->atributo;
    }

}