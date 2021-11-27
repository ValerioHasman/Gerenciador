<?php

namespace Models;

use Models\Conexao;
use PDO;

class Lotes
{
    private ?int $id;
    private string $doses;
    private string $codigo;
    private int $caixas;
    private int $unidades;
    private int $endereco;
    private int $empresa;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'id'){
            $this->$atributo = (int) filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'doses'){
            $this->$atributo = (int) filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'codigo'){
            $this->$atributo = filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'caixas'){
            $this->$atributo = (int) filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'unidades'){
            $this->$atributo = (int) filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'endereco'){
            $this->$atributo = (int) filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($atributo == 'empresa'){
            $this->$atributo = (int) filter_var(trim($value), FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public static function buscarDoBanco(): array|false
    {
        $sql = Conexao::getConexao()->prepare("SELECT lot_id, doses.dos_nome, lot_codigo, lot_numeros_de_caixas, lot_numeros_de_unidades_por_caixa, empresa.emp_nome emp_empresa , endereco.end_cidade FROM usuario
        INNER JOIN empresa ON (usuario.usu_id = empresa.usu_id)
        INNER JOIN lotes ON (lotes.emp_id = empresa.emp_id)
        INNER JOIN doses ON (doses.dos_id = lotes.dos_id)
        INNER JOIN endereco ON (endereco.end_id = lotes.end_id)
        WHERE usuario.usu_id = :usuario");
        $sql->bindValue(":usuario",$_SESSION['usu_id']);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return array('vazio' => '<div class="form-control alert-warning">Vazio! Faça o teu primeiro cadastro de dados</div>');
    }

    public function inserirNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("INSERT INTO Lotes (dos_id, lot_codigo, lot_numeros_de_caixas, lot_numeros_de_unidades_por_caixa, end_id, emp_id)
        VALUES (:doses, :codigo, :caixas, :unidades, :endereco, :empresa)");
        $sql->bindValue(":doses",$this->doses);
        $sql->bindValue(":codigo",$this->codigo);
        $sql->bindValue(":caixas",$this->caixas);
        $sql->bindValue(":unidades",$this->unidades);
        $sql->bindValue(":endereco",$this->endereco);
        $sql->bindValue(":empresa",$this->empresa);
        $sql->execute();
    }
    public function atualizarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("UPDATE Lotes SET dos_id = :doses, lot_codigo = :codigo, lot_numeros_de_caixas = :caixas, lot_numeros_de_unidades_por_caixa = :unidades, end_id = :endereco, emp_id = :empresa WHERE lot_id = :id");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":doses",$this->doses);
        $sql->bindValue(":codigo",$this->codigo);
        $sql->bindValue(":caixas",$this->caixas);
        $sql->bindValue(":unidades",$this->unidades);
        $sql->bindValue(":endereco",$this->endereco);
        $sql->bindValue(":empresa",$this->empresa);
        $sql->execute();
        
    }
    
    public function apagarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("DELETE lotes FROM lotes 
        INNER JOIN empresa ON (empresa.emp_id = lotes.emp_id)
        INNER JOIN doses ON (doses.dos_id = lotes.dos_id)
        INNER JOIN endereco ON (endereco.end_id = lotes.end_id)
        INNER JOIN usuario ON (usuario.usu_id = empresa.usu_id
        AND usuario.usu_id = doses.usu_id
        AND usuario.usu_id = endereco.usu_id)
        WHERE usuario.usu_id = :usuario and lotes.lot_id = :id;");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }
}
