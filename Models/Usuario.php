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
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'email'){
           
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_EMAIL);
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
        $sql = Conexao::getConexao()->prepare("SELECT usu_id FROM Usuario WHERE usu_email = :email AND usu_senha = :senha");
        $sql->bindValue(":email",$this->email);
        $sql->bindValue(":senha",$this->senha);
        $sql->execute();
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['usu_id'] = $dado['usu_id'];
            header('Location: ' . $GLOBALS["base"] .'sistema');
            exit;
        } else {
            echo "<div class='form-control alert-warning'>Erro ao entrar com seu cadastro, verifique os dados e tente novemente</div>";
        }
    }
    
    public function cadastrar(): void
    {
        $sql = Conexao::getConexao()->prepare("SELECT usu_id FROM Usuario WHERE usu_email = :email");
        $sql->bindValue(":email",$this->email);
        $sql->execute();
        if($sql->rowCount() > 0){
            echo "<div class='form-control alert-warning'>Erro ao entrar com seu cadastro, verifique os dados e tente novemente</div>";
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