<?php

class Lotes
{
    private ?int $id;
    private string $codigo;
    private int $caixas;
    private int $unidades;
    private Endereco $endereco;
    private Empresa $empresa;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'codigo'){
            $this->$atributo = $value;
        }
        if ($atributo == 'caixas'){
            $this->$atributo = $value;
        }
        if ($atributo == 'unidades'){
            $this->$atributo = $value;
        }
        if ($atributo == 'endereco'){
            $this->$atributo = $value;
        }
        if ($atributo == 'empresa'){
            $this->$atributo = $value;
        }
    }


    public function __get($atributo)
    {
        return $this->$atributo;
    }

}
