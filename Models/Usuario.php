<?php

class Usuario
{

    private ?int $id;
    private string $nome;
    private string $email;
    private string $senha;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'nome'){
            $this->atributo = $value;
        }
        if ($atributo == 'email'){
            $this->atributo = $value;
        }
        if ($atributo == 'senha'){
            $this->atributo = $value;
        }
    }


    public function __get($atributo)
    {
        return $this->atributo;
    }

}