<?php

class Empresa
{

    private ?int $id;
    private string $nome;
    private string $cnpj;
    private Usuario $usuario;


    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'name'){
            $this->atributo = $value;
        }
        if ($atributo == 'cnpj'){
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