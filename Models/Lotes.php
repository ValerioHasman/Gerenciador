<?php

class Lotes
{
    private ?int $id;
    private string $codigo;
    private int $caixas;
    private int $unidades;
    private Endereco $endereco;
    private Empresa $empresa;

    public function __construct(){}

    public function __set($atributo, $value): void
    {
        if ($atributo == 'codigo'){
            $this->$atributo = $value;
        }
        if ($atributo == 'caixas'){
            $this->$atributo = $value;
        }
        if ($atributo == 'unidades'){
            $this->$atributo = $value;
        }
        if ($atributo == 'endereco'){
            $this->$atributo = $value;
        }
        if ($atributo == 'empresa'){
            $this->$atributo = $value;
        }
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public static function buscarDoBanco(): array|false
    {
        $sql = Conexao::getConexao()->prepare("SELECT lot_id, doses.dos_nome, lot_codigo, lot_numeros_de_caixas, lot_numeros_de_unidades_por_caixa, endereco.end_cidade, empresa.emp_nome FROM usuario
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
        $sql = Conexao::getConexao()->prepare("INSERT INTO Lotes (lot_codigo, lot_numeros_de_caixas, lot_numeros_de_unidades_por_caixa, end_id, emp_id)
        VALUES (:codigo, :caixas, :unidades, :endereco, :empresa)");
        $sql->bindValue(":codigo",$this->codigo);
        $sql->bindValue(":caixas",$this->caixas);
        $sql->bindValue(":unidades",$this->unidades);
        $sql->bindValue(":endereco",$this->endereco);
        $sql->bindValue(":empresa",$this->empresa);
        $sql->execute();
    }
    public function atualizarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("UPDATE Lotes SET lot_codigo = :codigo, lot_caixas = :caixas, lot_unidades = :unidades, lot_endereco = :endereco, lot_empresa = :empresa WHERE dos_id = :id AND usu_id = :usuario");
        $sql->bindValue(":codigo",$this->codigo);
        $sql->bindValue(":caixas",$this->caixas);
        $sql->bindValue(":unidades",$this->unidades);
        $sql->bindValue(":endereco",$this->endereco);
        $sql->bindValue(":empresa",$this->empresa);
        $sql->execute();
    }
    
    public function apagarNoBanco(): void
    {
        $sql = Conexao::getConexao()->prepare("DELETE FROM Lotes WHERE dos_id = :id AND Usuario.usu_id = :usuario");
        $sql->bindValue(":id",$this->id);
        $sql->bindValue(":usuario",$_SESSION["usu_id"]);
        $sql->execute();
    }
}
