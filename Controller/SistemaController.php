<?php

class SistemaController extends Controller
{

    public function index(): void
    {
        $this->sessaoDesligada();
        

        $this->carregarTemplateDoSistema('sistema/sistema', array());
    }
    public function sair(): void
    {
        $this->sessaoDesligada();
        

        $this->carregarTemplateDoSistema('sistema/sair', array());
    }
}
