<?php

namespace Models;

use Models\Conexao;
use PDO;

class Pessoas
{

    private ?int $id;
    private string $nome;
    private string $cpf;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'id'){
            $this->$atributo = (int) filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'nome'){
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'cpf'){
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public static function buscarDoBanco(): array|false
    {
        $sql = Conexao::getConexao()->prepare("SELECT pes_id, pes_nome, pes_cpf FROM Pessoas WHERE usu_id = :id");
        $sql->bindValue(":id",$_SESSION['usu_id']);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return array('vazio' => '<div class="form-control alert-warning">Vazio! Faça o teu primeiro cadastro de dados</div>');
    }

    public function inserirNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("INSERT INTO Pessoas (pes_nome, pes_cpf, usu_id)
        VALUES (:nome, :cpf, :usuario)");
        $sql->bindValue(":nome",$this->nome);
        $sql->bindValue(":cpf",$this->cpf);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }

    public function atualizarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("UPDATE Pessoas SET pes_nome = :nome, pes_cpf = :cpf WHERE pes_id = :id AND usu_id = :usuario");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":nome",$this->nome);
        $sql->bindValue(":cpf",$this->cpf);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }

    public function apagarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("DELETE FROM Pessoas WHERE pes_id = :id AND usu_id = :usuario");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }
    //`pes_visivel` ENUM('S','N') NOT NULL DEFAULT '\'S\''
}
