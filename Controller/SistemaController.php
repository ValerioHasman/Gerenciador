<?php

class SistemaController extends Controller
{

    public function index(): void
    {
        $this->sessaoDesligada();

        if (isset($_POST['nome']) && isset($_POST['cpf'])){
            $pessoa = new Pessoas();
            $pessoa->nome = $_POST['nome'];
            $pessoa->cpf = $_POST['cpf'];
            if (isset($_POST['id']) && $_POST['id'] > 0){
                $pessoa->id = $_POST['id'];
                $pessoa->atualizarNoBanco();
            } else {
                $pessoa->inserirNoBanco();
            }
        }
        
        $this->carregarTemplateDoSistema('sistema/sistema', Pessoas::buscarDoBanco());
    }
    public function lotes(): void
    {
        $this->sessaoDesligada();

        if (isset($_POST['nome']) && isset($_POST['codigo']) && isset($_POST['caixas']) && isset($_POST['unidades']) && isset($_POST['empresa']) && isset($_POST['endereco'])){
            $lotes = new Lotes();
            $lotes->nome = $_POST['nome'];
            $lotes->codigo = $_POST['codigo'];
            $lotes->caixas = $_POST['caixas'];
            $lotes->unidades = $_POST['unidades'];
            $lotes->empresa = $_POST['empresa'];
            $lotes->endereco = $_POST['endereco'];
            if (isset($_POST['id']) && $_POST['id'] > 0){
                $lotes->id = $_POST['id'];
                $lotes->atualizarNoBanco();
            } else {
                $lotes->inserirNoBanco();
            }
        }
        
        $this->carregarTemplateDoSistema('sistema/lotes', Lotes::buscarDoBanco());
    }
    public function endereco(): void
    {
        $this->sessaoDesligada();
        
        if (isset($_POST['estado']) && isset($_POST['cidade']) && isset($_POST['cep']) && isset($_POST['numero'])){
            $endereco = new Endereco();
            $endereco->estado = $_POST['estado'];
            $endereco->cidade = $_POST['cidade'];
            $endereco->cep = $_POST['cep'];
            $endereco->numero = $_POST['numero'];
            if (isset($_POST['id']) && $_POST['id'] > 0){
                $endereco->id = $_POST['id'];
                $endereco->atualizarNoBanco();
            } else {
                $endereco->inserirNoBanco();
            }
        }

        $this->carregarTemplateDoSistema('sistema/endereco', Endereco::buscarDoBanco());
    }
    public function empresa(): void
    {
        $this->sessaoDesligada();

        if (isset($_POST['nome']) && isset($_POST['cnpj'])){
            $empresa = new Empresa();
            $empresa->nome = $_POST['nome'];
            $empresa->cnpj = $_POST['cnpj'];
            if (isset($_POST['id']) && $_POST['id'] > 0){
                $empresa->id = $_POST['id'];
                $empresa->atualizarNoBanco();
            } else {
                $empresa->inserirNoBanco();
            }
        }
        
        $this->carregarTemplateDoSistema('sistema/empresa', Empresa::buscarDoBanco());
    }
    public function doses(): void
    {
        $this->sessaoDesligada();

        if (isset($_POST['nome'])){
            $doses = new Doses();
            $doses->nome = $_POST['nome'];
            if (isset($_POST['id']) && $_POST['id'] > 0){
                $doses->id = $_POST['id'];
                $doses->atualizarNoBanco();
            } else {
                $doses->inserirNoBanco();
            }
        }
        
        $this->carregarTemplateDoSistema('sistema/doses', Doses::buscarDoBanco());
    }
    
    public function sair(): void
    {
        $this->sessaoDesligada();
        $this->carregarTemplateDoSistema('sistema/sair', array());
    }
}
