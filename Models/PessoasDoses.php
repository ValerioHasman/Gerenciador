<?php

class PessoasDoses
{

    private int $pessoas;
    private int $doses;
    private int $endereco;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'pessoas'){
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'doses'){
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'endereco'){
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public static function buscarDoBanco(): array|false
    {
        $sql = Conexao::getConexao()->prepare("SELECT pessoas.pes_id _pesid, pessoas.pes_nome _pes, doses.dos_id _dosid, doses.dos_nome _dos, endereco.end_id _endid, endereco.end_cidade _end FROM pessoasdoses
        INNER JOIN pessoas ON (pessoas.pes_id = pessoasdoses.pes_id)
        INNER JOIN doses ON (doses.dos_id = pessoasdoses.dos_id)
        INNER JOIN endereco ON (endereco.end_id = pessoasdoses.end_id)
        INNER JOIN usuario ON (pessoas.usu_id = usuario.usu_id)
        WHERE usuario.usu_id = :id;");
        $sql->bindValue(":id",$_SESSION['usu_id']);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return array('vazio' => '<div class="form-control alert-warning">Vazio! Faça o teu primeiro cadastro de dados</div>');
    }

    public function inserirNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("INSERT INTO `pessoasdoses` (`pes_id`, `dos_id`, `end_id`) VALUES (:pessoas, :doses, :endereco)");
        $sql->bindValue(":pessoas",$this->pessoas);
        $sql->bindValue(":doses",$this->doses);
        $sql->bindValue(":endereco",$this->endereco);
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
        $sql = Conexao::getConexao()->prepare("DELETE pessoasdoses FROM `pessoasdoses`
        INNER JOIN pessoas ON (pessoasdoses.pes_id = pessoas.pes_id)
        INNER JOIN doses ON (pessoasdoses.dos_id = doses.dos_id)
        INNER JOIN usuario ON (pessoas.usu_id = usuario.usu_id AND doses.usu_id = usuario.usu_id)
        WHERE `pessoasdoses`.`pes_id` = :pesid AND `pessoasdoses`.`dos_id` = :dosid AND end_id = :endid;");
        $sql->bindValue(":pesid",$this->pessoas);
        $sql->bindValue(":dosid",$this->doses);
        $sql->bindValue(":endid",$this->endereco);
        $sql->execute();
    }
    //`pes_visivel` ENUM('S','N') NOT NULL DEFAULT '\'S\''
}
