<?php

class Lotes
{
    private int $id;
    private string $codigo;
    private Endereco $endereco;

    public function __construct(){}

    public function __set($atributo, $value)
    {
        if ($atributo = 'name'){
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
