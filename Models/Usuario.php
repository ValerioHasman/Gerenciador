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
            $value = trim($value);
            filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
            $this->$atributo = $value;
        }
        if ($atributo == 'email'){
            filter_var($value, FILTER_SANITIZE_EMAIL);
            $this->$atributo = $value;
        }
        if ($atributo == 'senha'){
            $this->$atributo = md5(trim($value));
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function logar(): void
    {
        $sql = Conexao::getConexao()->prepare("SELECT * FROM Usuario WHERE usu_email = :email AND usu_senha = :senha");
        $sql->bindValue(":email",$this->email);
        $sql->bindValue(":senha",$this->senha);
        $sql->execute();
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['usu_id'] = $dado['usu_id'];
            $_SESSION['usu_nome'] = $dado['usu_nome'];
            $_SESSION['usu_email'] = $dado['usu_email'];
            header('Location: sistema');
            exit;
        } else {
            echo "errro";
        }
    }
    
    public function cadastrar(): void
    {
        $sql = Conexao::getConexao()->prepare("SELECT usu_id FROM Usuario WHERE usu_email = :email");
        $sql->bindValue(":email",$this->email);
        $sql->execute();
        if($sql->rowCount() > 0){
        } else {
            $sql = Conexao::getConexao()->prepare("INSERT INTO Usuario (usu_nome, usu_email, usu_senha)
            VALUES (:nome, :email, :senha)");
            $sql->bindValue(":nome",$this->nome);
            $sql->bindValue(":email",$this->email);
            $sql->bindValue(":senha",$this->senha);
            $sql->execute();
            $this->logar();
        }
        
    }

}