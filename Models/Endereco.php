<?php

class Endereco
{

    private ?int $id;
    private string $estado;
    private string $cidade;
    private string $cep;
    private string $numero;
    private Usuario $usuario;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'estado'){
            $this->atributo = $value;
        }
        if ($atributo == 'cidade'){
            $this->atributo = $value;
        }
        if ($atributo == 'cep'){
            $this->atributo = $value;
        }
        if ($atributo == 'numero'){
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