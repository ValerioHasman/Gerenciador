<?php

class SistemaController extends Controller
{

    public function index(): void
    {
        $this->carregarTemplateDoSistema('sistema/sistema', array());
    }
}
