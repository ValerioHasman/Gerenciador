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
            $pessoa->inserirNoBanco();
        }
        
        $this->carregarTemplateDoSistema('sistema/sistema', Pessoas::buscarDoBanco());
    }
    public function lotes(): void
    {
        $this->sessaoDesligada();

        if (isset($_POST['nome']) && isset($_POST['codigo']) && isset($_POST['caixas']) && isset($_POST['unidades']) && isset($_POST['empresa']) && isset($_POST['endereco'])){
            $empresa = new Lotes();
            $empresa->nome = $_POST['nome'];
            $empresa->codigo = $_POST['codigo'];
            $empresa->caixas = $_POST['caixas'];
            $empresa->unidades = $_POST['unidades'];
            $empresa->empresa = $_POST['empresa'];
            $empresa->endereco = $_POST['endereco'];
            $empresa->inserirNoBanco();
        }
        
        $this->carregarTemplateDoSistema('sistema/lotes', Lotes::buscarDoBanco());
    }
    public function endereco(): void
    {
        $this->sessaoDesligada();
        
        if (isset($_POST['estado']) && isset($_POST['cidade']) && isset($_POST['cep']) && isset($_POST['numero'])){
            $empresa = new Endereco();
            $empresa->estado = $_POST['estado'];
            $empresa->cidade = $_POST['cidade'];
            $empresa->cep = $_POST['cep'];
            $empresa->numero = $_POST['numero'];
            $empresa->inserirNoBanco();
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
            $empresa->inserirNoBanco();
        }
        
        $this->carregarTemplateDoSistema('sistema/empresa', Empresa::buscarDoBanco());
    }
    public function doses(): void
    {
        $this->sessaoDesligada();

        if (isset($_POST['nome'])){
            $doses = new Doses();
            $doses->nome = $_POST['nome'];
            $doses->inserirNoBanco();
        }
        
        $this->carregarTemplateDoSistema('sistema/doses', Doses::buscarDoBanco());
    }
    
    public function sair(): void
    {
        $this->sessaoDesligada();
        $this->carregarTemplateDoSistema('sistema/sair', array());
    }
}
