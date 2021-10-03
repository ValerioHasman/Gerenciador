<?php

class Conexao
{

    private static PDO $instancia;

    private function __construct(){}

    public static function getConexao(): PDO{
        if(!isset(self::$instancia)){
            $dbname = 'bd_2021_gerenciador';
            $host = 'localhost';
            $user = 'root';
            $senha = '';

            try {
                self::$instancia = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$senha);
            } catch (Exception $e) {
                echo "Erro: " . $e;
            }
        }
        return self::$instancia;
    }
}
