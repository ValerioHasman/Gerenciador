<h3>Lotes de Empresas registradas</h3>

<?php

if (isset($vazio)) {
  echo $vazio;
} else {
?>

  <table class="table">
    <thead>
      <tr>
        <th scope="row"></th>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Codigo</th>
        <th scope="col">Caixas</th>
        <th scope="col">Unidades</th>
        <th scope="col">Empresa</th>
        <th scope="col">Cidade</th>
      </tr>
    </thead>
    <tbody>
    <?php

foreach ($dadosModel as $array){
  echo '<tr><th scope="row"></th>';
  $whatever = new Models\Editar();
  foreach ($array as $chave => $valor){
    echo "<td>" . $valor . "</td>";
    $whatever->whatevers = 'data-bs-whatever'. substr($chave, 3) .'="' . $valor .'" ';
  }
  echo '<td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#lotes" '. $whatever->whatevers .' >Editar</button></td></tr>';
}
echo "</tbody></table>";
}
