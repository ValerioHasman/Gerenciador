<?php

class Editar
{
private string $whatevers;

public function __construct()
{
  $this->whatevers = '';
}

public function __set($name, $value)
{
  $this->$name .= $value;
}
public function __get($name)
{
  return $this->$name;
}
}
