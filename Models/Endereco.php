<?php

class Endereco
{

    private ?int $id;
    private string $estado;
    private string $cidade;
    private string $cep;
    private string $numero;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'estado'){
            $this->$atributo = $value;
        }
        if ($atributo == 'cidade'){
            $this->$atributo = $value;
        }
        if ($atributo == 'cep'){
            $this->$atributo = $value;
        }
        if ($atributo == 'numero'){
            $this->$atributo = $value;
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function buscarDoBanco(): array|false
    {
        $sql = Conexao::getConexao()->prepare("SELECT end_id, end_estado, end_cidade, end_cep, end_numero FROM Endereco WHERE usu_id = :id");
        $sql->bindValue(":id",$_SESSION['usu_id']);
        $sql->execute();
        if($sql->rowCount() > 0){
            return array('<div class="form-control alert-warning">Vazio! Faça o teu primeiro cadastro de dados</div>');
        }
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserirNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("INSERT INTO Endereco (end_estado, end_cidade, end_cep, end_numero, usu_id)
        VALUES (:estado, :cidade, :cep, :numero, :usuario)");
        $sql->bindValue(":estado",$this->estado);
        $sql->bindValue(":cidade",$this->cidade);
        $sql->bindValue(":cep",$this->cep);
        $sql->bindValue(":numero",$this->numero);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }

    public function atualizarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("UPDATE Endereco SET end_estado = :estado, end_cidade = :cidade, end_cep = :cep, end_numero = :numero WHERE end_id = :id AND usu_id = :usuario");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":estado",$this->estado);
        $sql->bindValue(":cidade",$this->cidade);
        $sql->bindValue(":cep",$this->cep);
        $sql->bindValue(":numero",$this->numero);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }
}