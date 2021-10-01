<?php

class Core
{
    private string $caminho;
    private string $controller;
    private string $metodo;
    private array $parametros;
    private array $url;
    private object $c;


    public function __construct()
    {
        $this->parametros = array();
        $this->run();
    }
    public function run(): void
    {

        if (isset($_GET['pag'])) {
            $this->url[] = $_GET['pag'];
        }
        if (!empty($this->url)) {
            $this->url = explode("/", $this->url[0]);
            $this->controller = $this->url[0] . 'Controller';
            array_shift($this->url);

            if (isset($this->url) && !empty($this->url[0])) {
                $this->metodo = $this->url[0];
                array_shift($this->url);
            } else {
                $this->metodo = 'index';
                array_shift($this->url);
            }
            if (count($this->url) > 0) {
                $this->parametros = $this->url;
            }
        } else {
            $this->controller = 'HomeController';
            $this->metodo = 'index';
        }

        $this->caminho = 'Gerenciador/Controller' . $this->controller . '.php';

        if (!file_exists($this->caminho) && !method_exists($this->controller, $this->metodo)) {
            $this->controller = 'HomeController';
            $this->metodo = 'index';
        }
        $this->c = new $this->controller;

        call_user_func_array(array($this->c, $this->metodo), $this->parametros);
    }
}
