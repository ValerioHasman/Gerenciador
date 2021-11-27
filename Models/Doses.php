<?php

namespace Models;

use Models\Conexao;
use PDO;

class Doses
{

    private ?int $id;
    private string $nome;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'id'){
            $this->$atributo = (int) filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'nome'){
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public static function buscarDoBanco(): array|false
    {
        $sql = Conexao::getConexao()->prepare("SELECT dos_id, dos_nome FROM Doses WHERE usu_id = :id");
        $sql->bindValue(":id",$_SESSION['usu_id']);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return array('vazio' => '<div class="form-control alert-warning">Vazio! Faça o teu primeiro cadastro de dados</div>');
    }

    public function inserirNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("INSERT INTO Doses (dos_nome, usu_id)
        VALUES (:nome, :usuario)");
        $sql->bindValue(":nome",$this->nome);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }
    public function atualizarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("UPDATE Doses SET dos_nome = :nome WHERE dos_id = :id AND usu_id = :usuario");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":nome",$this->nome);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }
    
    public function apagarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("DELETE FROM Doses WHERE dos_id = :id AND usu_id = :usuario");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }
}