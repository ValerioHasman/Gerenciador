<?php

class Empresa
{

    private ?int $id;
    private string $nome;
    private string $cnpj;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'name'){
            $this->$atributo = $value;
        }
        if ($atributo == 'cnpj'){
            $this->$atributo = $value;
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function buscarDoBanco(): array|false
    {
        $sql = Conexao::getConexao()->prepare("SELECT emp_id, emp_nome, emp_cnpj FROM Empresa WHERE usu_id = :id");
        $sql->bindValue(":id",$_SESSION['usu_id']);
        $sql->execute();
        if($sql->rowCount() > 0){
            return array('<div class="form-control alert-warning">Vazio! Faça o teu primeiro cadastro de dados</div>');
        }
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserirNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("INSERT INTO Empresa (emp_nome, emp_cnpj, usu_id)
        VALUES (:nome, :cnpj, :usuario)");
        $sql->bindValue(":nome",$this->nome);
        $sql->bindValue(":cnpj",$this->cnpj);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }

    public function atualizarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("UPDATE Empresa SET emp_nome = :nome, emp_cnpj = :cnpj WHERE emp_id = :id AND usu_id = :usuario");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":nome",$this->nome);
        $sql->bindValue(":cnpj",$this->cnpj);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }
}