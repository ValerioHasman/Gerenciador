<?php

class Pessoas
{

    private ?int $id;
    private string $nome;
    private string $cpf;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'nome'){
            $this->$atributo = $value;
        }
        if ($atributo == 'cpf'){
            $this->$atributo = $value;
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function buscarDoBanco(): array|false
    {
        $sql = Conexao::getConexao()->prepare("SELECT pes_id, pes_nome, pes_cpf FROM Pessoas WHERE usu_id = :id");
        $sql->bindValue(":id",$_SESSION['usu_id']);
        $sql->execute();
        if($sql->rowCount() > 0){
            return array('<div class="form-control alert-warning">Vazio! Faça o teu primeiro cadastro de dados</div>');
        }
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserirNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("INSERT INTO Pessoas (pes_estado, pes_cpf, usu_id)
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
}
