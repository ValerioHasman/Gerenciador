<?php

class Empresa{

    private int $id;
    private string $nome;
    private string $cnpj;
    private Lotes $lotes;

    public function __construct(){}

    public function __set($atributo, $value)
    {
        if ($atributo = 'name'){
            $this->atributo = $value;
        }
        if ($atributo = 'cnpj'){
            $this->atributo = $value;
        }
        if ($atributo = 'lotes'){
            $this->atributo = $value;
        }
    }


    public function __get($atributo)
    {
        return $this->atributo;
    }

}