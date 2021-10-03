<?php

class SistemaController extends Controller
{

    public function index(): void
    {
        $this->sessaoLigada();
        

        $this->carregarTemplateDoSistema('sistema/sistema', array());
    }
    public function sair(): void
    {
        $this->sessaoLigada();
        

        $this->carregarTemplateDoSistema('sistema/sair', array());
    }
}
